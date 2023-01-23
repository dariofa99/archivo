@extends('layouts.dashboard')

@push('styles')
<!-- aqui van los estilos de cada vista -->
@endpush

@section('navbar')
<!-- aqui va el menu de cada vista -->
  @include('content.archivo.navbar')

@endsection

@section('content')
<div class="content-header">
{{--   <section class="content-header">
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
</div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- include('components.callout_info') -->
<div class="row">

<div class="col">

<div class="lbl_ruta_folder">  <h6> <strong>Dirección:</strong>  <small> <label id="lbl_ruta">
<?php
echo ($carpeta->getRuta());
?>
</label></small></h6>
</div>


</div>
</div>
        <div class="row">

          <div class="col-md-3">
            <div class="card-folder" style="font-size:12px;">
               <div class="card-header">


                <h3 class="card-title">
                  <i class="fas fa-folder"></i>
                 Carpetas
                </h3>
              </div>
              <div class="card-body " id="menu-subcarpetas">
              <input type="hidden" id="folder_old_value">
              <ul id="menu-carpetas">
              @include('content.archivo.partials.subcarpetas')
  </ul>
              
              </div>
            </div>
          
          </div>
          <div class="col-md-9">
            <div class="card card-cascade wider reverse">
             <div class="card-header">
             <div class="row">
              <div class="col-9">
              <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                 Archivos
                </h3>
              </div>

              <div class="col float-right">
                <input class="form-control" id="input_search_file" name="input_search_file" type="text" placeholder="Buscar" aria-label="buscar">
              </div>
             </div>
             

                

               
              </div>
              <div class="card-body" style="min-height:350px;">

               <input type="hidden" id="folder_parent_id" value="{{$carpeta->id}}">
                 
                <div class="row">
                  <div class="col-md-12">
                <div class="contenedor_ajax_paginate">
                @include('content.archivo.index_ajax')
                </div>
                
                  </div>
                </div>
               
             </div>
            
            </div>
          </div>
        
        </div>






      </div>

    </section>
    <!-- /.content -->
@include('content.archivo.partials.modals.create_archivo')
@include('content.archivo.partials.modals.detalles_archivo')
@include('content.carpeta.partials.modals.create_carpeta')
@endsection

@push('scripts')
<!-- aqui van los scripts de cada vista -->
<script>
class Carpeta{
  constructor(id = '', nombre = '',carpeta_padre_id='',estado_id='') {
		this.id = id;
		this.nombre = nombre;
    this.carpeta_padre_id = carpeta_padre_id;
    this.estado_id = estado_id;
  }
    store(data){
       var route = "/carpetas" ;       
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
      $("#myModal_nueva_carpeta").modal('hide');
       $("#menu-carpetas").html(res);
          },
        error:function(xhr, textStatus, thrownError){
                    
            
        }
        });
    }

    delete(id,carpeta) {
      var route = '/carpetas/'+id;
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
           /* var route = window.location.href
              carpeta.index_page(route)*/
              if(respu.delete){
                 $("#element_folder-"+id).remove()
                  Swal.fire(
                  'Eliminado!',
                  'El archivo ha sido eliminado con exito.',
                  'success'
                )
              }else{
                
                    Swal.fire(
                    'Error!',
                    'No se puede eliminar, asegurate que no tenga carpetas asociadas.',
                    'error'
                  )
              }
         
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
       var route = "/carpetas/"+this.id ;       
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
          $("#lbl_carpeta-"+res.id).text(res.nombre);         
          $(".inputFolderName").attr('type','hidden');
          $(".btn_lbl_carpeta").show();
        },
        error:function(xhr, textStatus, thrownError){
            
            
        }
        });
    }
	
}


class Archivo{

constructor(id = '', nombre = '',documento_id = '', estado_id = '', carpeta_id = '') {
		this.id = id;
		this.nombre = nombre;
		this.documento_id = documento_id;
		this.estado_id = estado_id;
		this.carpeta_id = carpeta_id;		
	}

  store(data,archivo){
     var route = "/archivos" ;
       // var token = $("#token").val();
       // 
        $.ajax({ 
        url: route,
        headers: { 'X-CSRF-TOKEN' : token },
        type:'POST',
        datatype: 'json',
        data: data,
        cache: false,
            contentType: false,
            processData: false, 
        /*muestra div con mensaje de 'regristrado'*/
         beforeSend: function(xhr){
      xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
        
    
        },
        success:function(res){
       
        var route = window.location.href
        archivo.index_page(route)
                 //archivo.index_page()
          },
        error:function(xhr, textStatus, thrownError){
            
            
        }
        });
  }

  update(data,archivo){
     var route = "/archivos/"+archivo.id ;
       // var token = $("#token").val();
       // 
        $.ajax({ 
        url: route,
        headers: { 'X-CSRF-TOKEN' : token },
        type:'POST',
        datatype: 'json',
        data: data,
        cache: false,
            contentType: false,
            processData: false, 
        /*muestra div con mensaje de 'regristrado'*/
         beforeSend: function(xhr){
      xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
        
    
        },
        success:function(res){
        
        var route = window.location.href
        archivo.index_page(route)
        
          },
        error:function(xhr, textStatus, thrownError){
            
            
        }
        });
  }

  
	index_page(route, request = null) {
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
		      $("#myModal_nuevo_archivo").modal('hide');          
          $(".contenedor_ajax_paginate").html(res.archivos);
          $("#menu-carpetas").html(res.subcarpetas);
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

  edit(id,modal='') {
  var route = '/archivos/'+id+/edit/;
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
        if(modal=='detalles'){
           abrirModalDetallesArchivo(respu);
        }else{
 abrirModalEditArchivo(respu);
        }
       
       

        console.log(this) 
			/*$(".contenedor_ajax_paginate").html(res.archivos);
      $("#menu-carpetas").html(res.subcarpetas);
      $("#lbl_ruta").html(res.ruta);
      $("#folder_parent_id").val(id)
       window.history.pushState(null, '',route); */
			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	}

  delete(id,archivo) {
  var route = '/archivos/'+id;
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
         var route = window.location.href
          archivo.index_page(route)

        console.log(respu) 
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


}

(function(){
  $(".contenedor_ajax_paginate").on('click', '.page-link', function (e) {
		e.preventDefault();
		archivo = new Archivo();
		url = $(this).attr('href');
		archivo.index_page(url);
		window.history.pushState(null, '', url);
	})
$("#btn_nuevo_archivo").on("click",function(e){
  e.preventDefault();
  var date = new Date();
  var timestamp = date.getTime();  
  $("#lbl_modal_title").text('Nuevo Archivo')
  $("#myformEditArchivo").attr('id','myformNewArchivo');
  $("#myformNewArchivo #lbl_nombre_archivo").text('Sin archivo...');
  $("#myformNewArchivo button[type='button']").text('Crear nuevo archivo');
  $("#myformNewArchivo button[type='button']").removeClass('btn-warning').addClass('btn-primary');
  $("#myformNewArchivo button[type='button']").attr('type','submit');
  $("#myformNewArchivo")[0].reset();
  $("#codigo").val(timestamp);
  $("#carpeta_id").val($("#folder_parent_id").val());
  $("#lbl_codigo span").text(timestamp);
  $("#myModal_nuevo_archivo").modal('show');
});

$("#btn_nueva_carpeta").on("click",function(e){
  e.preventDefault();
  $("#carpeta_padre_id").val($("#folder_parent_id").val());
  $("#myModal_nueva_carpeta").modal('show');
});

$("#content_form_archivo").on('click',"#myformEditArchivo button[type='button']",function(e){
  
var errors = validateForm('myformEditArchivo');
   
      if(errors.length<=0){
        var data = setFormToObject('myformEditArchivo');
        var archivo = new Archivo();
        archivo.id = data.id;
        archivo.nombre = data.nombre;
        archivo.documento_id = data.documento_id;
        archivo.estado_id = data.estado_id;
        archivo.carpeta_id = data.carpeta_id;
        var data= new FormData(document.getElementById('myformEditArchivo'));
        archivo.update(data,archivo);       
      }
 e.preventDefault(document.getElementById('myformEditArchivo'));
        return false;
});

$("#myformNewArchivo").submit(function(e){
var errors = validateForm('myformNewArchivo');
    if(errors.length<=0){
        var data = setFormToObject('myformNewArchivo');
        var archivo = new Archivo();
        archivo.nombre = data.nombre;
        archivo.documento_id = data.documento_id;
        archivo.estado_id = data.estado_id;
        archivo.carpeta_id = data.carpeta_id
        var data= new FormData(document.getElementById('myformNewArchivo'));
        archivo.store(data,archivo);       
      }
e.preventDefault();
});



$("#myformNewCarpeta").submit(function(e){
var errors = validateForm('myformNewCarpeta');
   
      if(errors.length<=0){
        var data = setFormToObject('myformNewCarpeta');
        console.log(data)
        var carpeta = new Carpeta();
        carpeta.nombre = data.nombre;
        carpeta.carpeta_padre_id = data.carpeta_padre_id;
        carpeta.estado_id = data.estado_id;
        carpeta.store(data,carpeta);    
      }
e.preventDefault();
});

$("#menu-carpetas").on('dblclick','.subcarpeta',function(e) {
  e.preventDefault()
  var id = $(this).attr('data-id');
  var carpeta = new Archivo();
  status = $("#estado_id").val();
  carpeta.show(status,id);
  
});

$("#menu-carpetas").on('dblclick','.btn_lbl_carpeta',function(e) {
  e.preventDefault();
   $(".inputFolderName").attr('type','hidden');
   $(".btn_lbl_carpeta").show();
  var id = $(this).attr('id').split('-')[1];
   carpeta = new Carpeta(id,$(this).text().trim());
  $(this).hide()  ;
  $("#inputFolderName-"+id).attr('type','text');
  $("#inputFolderName-"+id).focus();
  $("#folder_old_value").val(carpeta.nombre);
  input_focus =  $("#inputFolderName-"+id);
 
});

$("#lbl_ruta").on('click','.btn_ruta',function(e){
  e.preventDefault();
  var id = $(this).attr('id');
  if(id!=$("#folder_parent_id").val()){
  var archivo = new Archivo();
   status = $("#estado_id").val();
   archivo.show(status,id);
  }
});

$("#lbl_ruta").on('click','.btn_ruta',function(e){
  e.preventDefault();
  var id = $(this).attr('id');
  if(id!=$("#folder_parent_id").val()){
  var archivo = new Archivo();
   status = $("#estado_id").val();
   archivo.show(status,id);
  }
});

/* $(".inputFolderName" ).keypress(function( event ) {
  if ( event.which == 13 ) {
     event.preventDefault();
     var input = $(this);    
      var id = input.attr('id').split('-')[1]; 
      if($("#folder_old_value").val()!=input.val()){
          carpeta = new Carpeta(id,input.val(),$("#folder_parent_id").val());
          carpeta.update();        
      }else{
        $(".inputFolderName").attr('type','hidden');
        $(".btn_lbl_carpeta").show();
      } 
  } 
});
 */
$("#menu-carpetas" ).on('keypress','.inputFolderName',function( event ) {
  if ( event.which == 13 ) {
     event.preventDefault();
     var input = $(this);    
      var id = input.attr('id').split('-')[1]; 
      if($("#folder_old_value").val()!=input.val()){
          carpeta = new Carpeta(id,input.val(),$("#folder_parent_id").val());
          carpeta.update();        
      }else{
        $(".inputFolderName").attr('type','hidden');
        $(".btn_lbl_carpeta").show();
      } 
  } 
});

$(".contenedor_ajax_paginate").on('click','.btn_editar_archivo',function(e){
  var id = $(this).attr('id');
  archivo = new Archivo();
  archivo.edit(id);
});

$(".contenedor_ajax_paginate").on('click','.btn_detalles_archivo',function(e){
  var id = $(this).attr('id');
  archivo = new Archivo();
  archivo.edit(id,'detalles');
});






$(".contenedor_ajax_paginate").on('click','.btn_eliminar_archivo',function(e){
   var id = $(this).attr('id');
  archivo = new Archivo();
Swal.fire({
  title: '¿Estas seguro de eliminar el registro?',
  text: "Los cambios no pueden ser revertidos!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'SI, eliminar!'
}).then((result) => {
  if (result.value) {
     archivo.delete(id,archivo);   
  }
});

  
});

$("#menu-carpetas").on('click','.btn_eliminar_carpeta',function(e){
   var id = $(this).attr('id').split('-')[1];
  carpeta = new Carpeta();
Swal.fire({
  title: '¿Estas seguro de eliminar la carpeta?',
  text: "Se eliminará toda la información y los cambios no pueden ser revertidos!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'SI, eliminar!'
}).then((result) => {
  if (result.value) {
     carpeta.delete(id,carpeta);   
  }
});  
});

$("#input_search_file").on('keyup',function(e){
  var data = {'carpeta_id':$("#folder_parent_id").val(),'data_search':$(this).val()};
  var archivo = new Archivo();
   //status = $("#estado_id").val();
   href = window.location.href;
   archivo.index_page(href,data);
  console.log($(this).val())
})


})(); 

function abrirModalEditArchivo(respu){
   $("#lbl_modal_title").text('Actualizando Archivo')
  $("#myformNewArchivo").attr('id','myformEditArchivo');
  $("#myformEditArchivo input[name='id']").val(respu.id);
  $("#myformEditArchivo input[name='nombre']").val(respu.nombre);
  $("#myformEditArchivo input[name='codigo']").val(respu.codigo);
  $("#myformEditArchivo input[name='fecha']").val(respu.created_at);
  $("#myformEditArchivo #lbl_nombre_archivo").text(respu.file_name);
  $("#myformEditArchivo #lbl_codigo").text(respu.codigo);
  $("#myformEditArchivo #lbl_fecha").text(respu.created_at);
  $("#myformEditArchivo textarea[name='descripcion']").val(respu.descripcion);
  $("#myformEditArchivo select[name='documento_id']").val(respu.documento_id);
  $("#myformEditArchivo button[type='submit']").text('Actualizar');
  $("#myformEditArchivo button[type='submit']").removeClass('btn-primary').addClass('btn-warning');
  $("#myformEditArchivo button[type='submit']").attr('type','button');
  $("#myModal_nuevo_archivo").modal('show');  
}

function abrirModalDetallesArchivo(respu){
  console.log(respu)
     //$("#myformDetallesArchivo label[id='lbl_codigo']").val(respu.id);
  $("#myformDetallesArchivo label[id='lbl_nombre']").text(respu.nombre);
  $("#myformDetallesArchivo label[id='lbl_codigo']").text(respu.codigo);
  $("#myformDetallesArchivo label[id='lbl_fecha']").text(respu.created_at);
  $("#myformDetallesArchivo #lbl_file_name").text(respu.file_name);
  $("#myformDetallesArchivo #lbl_descripcion").text(respu.descripcion);
  $("#myformDetallesArchivo #lbl_documento_id").text(respu.tipo.ref_nombre);
   $("#myformDetallesArchivo #lbl_user_name").text(respu.user.name);
 
  $("#myModal_detalles_archivo").modal('show');  
}




var folder_activate = false;
document.addEventListener("click", function(e){
  try {
    if(!$(e.target).attr('type')){
      var input = $("#menu-carpetas input[type='text']");    
      var id = input.attr('id').split('-')[1]; 
      if($("#folder_old_value").val()!=input.val()){
          carpeta = new Carpeta(id,input.val(),$("#folder_parent_id").val());
          carpeta.update();         
      }else{
        $(".inputFolderName").attr('type','hidden');
        $(".btn_lbl_carpeta").show();
      }      
    }
  }catch(e){

  }  
});


input = document.getElementById('validatedCustomFile');
if (input) {
  input.addEventListener('change', function( e ) {
    var fileName = '';
    //console.log(this.files[0].name);
    if( this.files || this.files.length > 1 ){
      fileName = ( this.files[0].name );
      size = ( this.files[0].size );
      if(size>=1000000){
        size = (((size/1024)/1024)).toFixed(2);
        label = "("+size+"MB)";
      }else{
         size = (((size/1024))).toFixed(0)
         label = "("+size+"Kb)";
      }
      
      console.log(this.files[0]);
     
      $("#lbl_nombre_archivo").text(fileName+" "+label); 

    }
   }
);
} 


</script>

@endpush

