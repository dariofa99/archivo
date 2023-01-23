@extends('layouts.dashboard')

@push('styles')
<!-- aqui van los estilos de cada vista -->
@endpush

@section('navbar')
<!-- aqui va el menu de cada vista -->
  @include('content.dependencias.navbar')
@endsection

@section('content')
<div class="content-header">
  {{-- <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
                Modals & Alerts 
                <small>new</small>
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Modals & Alerts</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
  </section> --}}
    <!-- /content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- include('components.callout_info') -->

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h6 class="card-title">
                 Dependencias<br>
             
                </h6>
              </div>
              <div class="card-body">
   
              <div class="row">
                <div class="offset-md-1 col-md-10 contenedor_ajax_paginate">
                  @include('content.dependencias.index_ajax')
                               
                </div>


              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
@include('content.dependencias.partials.modals.create_dependencia')
@endsection

@push('scripts')
<!-- aqui van los scripts de cada vista -->
<script>
class Dependencia{
  constructor(id = '', nombre = '',descripcion='') {
		this.id = id;
		this.nombre = nombre;
    this.descripcion = descripcion;
  }
  index_page(route, request = null) {
		//alert('')
		var route = route;
		$.ajax({
			url: route,
			type: 'GET',
			datatype: 'json',
			data: request,
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));

			},
			/*muestra div con mensaje de 'regristrado'*/
			success: function (res) {
			
				$(".contenedor_ajax_paginate").html(res);

			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	} 

    store(data){
      dependencia = this;
       var route = "/dependencias" ;       
        $.ajax({ 
        url: route,
        headers: { 'X-CSRF-TOKEN' : token },
        type:'POST',
        datatype: 'json',
        data: this,
        cache: false,
        beforeSend: function(xhr){
          xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));   
        },
        success:function(res){
          //	$(".contenedor_ajax_paginate").html(res);
var url = window.location.href;
        dependencia.index_page(url);
            $("#myModal_nueva_dependencia").modal('hide');
           
        },
        error:function(xhr, textStatus, thrownError){
            
            
        }
        });
    }

    delete(id,carpeta) {
      var route = '/dependencias/'+id;
        $.ajax({
          url: route,
          type: 'DELETE',
          datatype: 'json',
          data: {},
          cache: false,
          beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
          },
          /*muestra div con mensaje de 'regristrado'*/
          success: function (respu) {
           var url = window.location.href;
        dependencia.index_page(url);
           Swal.fire(
          'Eliminado!',
          'El archivo ha sido eliminado con exito.',
          'success'
        )
          },
          error: function (xhr, textStatus, thrownError) {
            alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
          }
        });
	}

  edit(id) {
  var route = '/dependencias/'+id+'/edit';
		$.ajax({
			url: route,
			type: 'GET',
			datatype: 'json',
			data: {},
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
			},
			/*muestra div con mensaje de 'regristrado'*/
			success: function (respu) {
        //archivo = new Archivo(respu.id,respu.nombre)
        abrirModalEditDependencia(respu);

        console.log(this) 
			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	}

show(status,id) {
  var route = '/carpetas/'+status+'/'+id;
		$.ajax({
			url: route,
			type: 'GET',
			datatype: 'json',
			data: {},
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
			},
			/*muestra div con mensaje de 'regristrado'*/
			success: function (res) {
		
			$(".contenedor_ajax_paginate").html(res.archivos);
      $("#menu-carpetas").html(res.subcarpetas);
      $("#lbl_ruta").html(res.ruta);
      $("#folder_parent_id").val(id)
       window.history.pushState(null, '',route); 
			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	}
      update(data={}){
        dependencia = this;
       var route = "/dependencias/"+this.id ;       
        $.ajax({ 
        url: route,
        headers: { 'X-CSRF-TOKEN' : token },
        type:'PUT',
        datatype: 'json',
        data: this,
        cache: false,
        beforeSend: function(xhr){
          xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));   
        },
        success:function(res){
          var url = window.location.href;
        dependencia.index_page(url);
            $("#myModal_nueva_dependencia").modal('hide');
        },
        error:function(xhr, textStatus, thrownError){
            
            
        }
        });
    }
	
}

(function(){
  
$("#btn_nueva_dependencia").on("click",function(e){
  e.preventDefault(); 
  $("#myformEditDependencia input[type='submit']").val('Enviar');
	$("#myformEditDependencia input[type='submit']").removeClass('btn-warning').addClass('btn-primary'); 
	$("#myformEditDependencia").attr('id', 'myformNuevaDependencia');
  $("#myformNuevaDependencia")[0].reset();
  $("#lbl_modal_title").text('Creando Dependencia');	 
  $("#myModal_nueva_dependencia").modal('show');
}); 

$(".contenedor_ajax_paginate").on("click",'.btn_editar_dep',function(e){
  e.preventDefault();
    dependencia = new Dependencia();
    var id = $(this).attr('id');
    dependencia.edit(id);
  
}); 

$("#content_component_form").on("submit",'#myformNuevaDependencia',function(e){
 
   var errors = validateForm('myformNuevaDependencia');
   
      if(errors.length<=0){
        var data = setFormToObject('myformNuevaDependencia');
        dependencia = new Dependencia();
        dependencia.nombre = data.nombre;
        dependencia.descripcion = data.descripcion;
        dependencia.store();           
      }
      e.preventDefault();      
});

$("#content_component_form").on("submit",'#myformEditDependencia',function(e){

   var errors = validateForm('myformEditDependencia');
   
      if(errors.length<=0){
        var data = setFormToObject('myformEditDependencia');
        dependencia = new Dependencia();
        dependencia.id = data.id;
        dependencia.nombre = data.nombre;
        dependencia.descripcion = data.descripcion;
        dependencia.update(data);       
        
      }
      e.preventDefault();      
});

 $(".contenedor_ajax_paginate").on('click','.btn_eliminar_dep',function(e){
  e.preventDefault();
  dependencia = new Dependencia();
  id = $(this).attr('id');  
    Swal.fire({
      title: '¿Estas seguro de eliminar el registro?',
      text: "Los cambios no pueden ser revertidos!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'SI, eliminar!',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.value) {
        dependencia.delete(id);  
      }
    });
});



})(); 

function abrirModalEditDependencia(respu){
   $("#lbl_modal_title").text('Actualizando Dependencia')
  $("#myformNuevaDependencia").attr('id','myformEditDependencia');
  $("#myformEditDependencia input[name='id']").val(respu.id);
  $("#myformEditDependencia input[name='nombre']").val(respu.nombre);
  $("#myformEditDependencia textarea[name='descripcion']").val(respu.descripcion);  
  $("#myformEditDependencia input[type='submit']").val('Actualizar');
  $("#myformEditDependencia input[type='submit']").removeClass('btn-primary').addClass('btn-warning');
  $("#myModal_nueva_dependencia").modal('show');  
}

</script>

@endpush

