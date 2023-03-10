@extends('layouts.dashboard')

@push('styles')
<!-- aqui van los estilos de cada vista -->
@endpush

@section('navbar')
<!-- aqui va el menu de cada vista -->
  @include('content.referencias.tipo_estado.navbar')
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
                 Tipos de estado<br>
             
                </h6>
              </div>
              <div class="card-body">
   
              <div class="row">
                <div class="offset-md-1 col-md-10 contenedor_ajax_paginate">
                  @include('content.referencias.tipo_estado.index_ajax')
                               
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
@include('content.referencias.tipo_estado.partials.modals.create_tipo_estado')
@endsection

@push('scripts')
<!-- aqui van los scripts de cada vista -->
<script>


(function(){
  
$("#btn_nuevo_estado").on("click",function(e){
  e.preventDefault(); 
  $("#myformEditTipoEstado input[type='submit']").val('Actualizar');
	$("#myformEditTipoEstado input[type='submit']").removeClass('btn-warning').addClass('btn-primary'); 
	$("#myformEditTipoEstado").attr('id', 'myformNuevoTipoEstado');
  $("#myformNuevoTipoEstado")[0].reset();
  $("#lbl_modal_title").text('Creando Estado');	
  setEstados();
  $("#myModal_nuevo_tipo_estado").modal('show');
}); 

$(".contenedor_ajax_paginate").on("click",'.btn_editar_ref',function(e){
  e.preventDefault();
   var referencia = new Referencia();
   var id = $(this).attr('id');
  referencia.edit(id);
  setEstados(); 
}); 

$("#content_component_form").on("submit",'#myformNuevoTipoEstado',function(e){
 
   var errors = validateForm('myformNuevoTipoEstado');
   
      if(errors.length<=0){
        var data = setFormToObject('myformNuevoTipoEstado');
        referencia = new Referencia();
        referencia.ref_nombre = data.ref_nombre;
        referencia.descripcion = data.descripcion;
        referencia.tabla = 'archivos';
        referencia.categoria = 'tipo_estado';
        referencia.duracion = data.duracion;
        referencia.siguiente_estado = data.siguiente_estado;
        referencia.store();       
        var url = window.location.href;
        referencia.index_page(url);
      }
      e.preventDefault();      
});

$("#content_component_form").on("submit",'#myformEditTipoEstado',function(e){
 // $("#myModal_nuevo_tipo_doc").modal('hide');
  
   var errors = validateForm('myformEditTipoEstado');
   
      if(errors.length<=0){
        var data = setFormToObject('myformEditTipoEstado');
        referencia = new Referencia();
        referencia.id = data.id;
        referencia.ref_nombre = data.ref_nombre;
        referencia.descripcion = data.descripcion;
        referencia.tabla = 'archivos';
        referencia.categoria = 'tipo_estado';
        referencia.duracion = data.duracion;
        referencia.siguiente_estado = data.siguiente_estado;
        referencia.update(data);       
        
      }
      e.preventDefault();      
});

 $(".contenedor_ajax_paginate").on('click','.btn_eliminar_ref',function(e){
  e.preventDefault();
  referencia = new Referencia();
  id = $(this).attr('id');  
    Swal.fire({
      title: '??Estas seguro de eliminar el registro?',
      text: "Los cambios no pueden ser revertidos!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'SI, eliminar!',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.value) {
        referencia.delete(id);  
      }
    });
});


})(); 

function setEstados(){ 
  var row = '';
  $(".tipos_estado").each(function(index,obj){
    var id = $(this).val().split('-')[0] 
    var value = $(this).val().split('-')[1] 
    row+=`<option value="${id}">${value}</option> `
  });
  $("#siguiente_estado").html(row)

}

</script>

@endpush

