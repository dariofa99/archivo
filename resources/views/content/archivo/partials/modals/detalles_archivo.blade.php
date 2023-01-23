@component('components.modal_dynamic')

	@slot('trigger')
		myModal_detalles_archivo
	@endslot

	@slot('title')
		<h6><label id="">Detalles Archivo</label></h6>
	@endslot


	@slot('body')


 	<div class="row">
		<div class="col-md-12">
		        <div class="card offset-md-1 col-md-10" id="content_form_archivo">
            
              <form id="myformDetallesArchivo" enctype="multipart/form-data" method="POST">
                   
                    <table class="table text-center">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Código</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><label id="lbl_codigo"><span>00010</span></label></td>
                          <td><label for="tipo_estado_id">{{$carpeta->estado->ref_nombre}}</label></td>
                          <td><label id="lbl_fecha" for="fecha"></label></td>
                        </tr>

                      </tbody>
                    </table>    
                    
                      <hr>    
                      <div class="row"> 

                      <div class="col-md-4">
                      <label for="nombre" class="d-block">Nombre Archivo</label>                       
                      </div>

                        <div class="col-md-6">
                            <label id="lbl_nombre"></label>
                        </div>
                      </div>

                           <div class="row"> 
                                            
                      <div class="col-md-4">
                       <label for="documento_id">Tipo Archivo</label>
                                            
                      </div>

                        <div class="col-md-6">
                            <label id="lbl_documento_id"></label> 
                        </div>
                      </div>

                           <div class="row"> 
                                            
                      <div class="col-md-4">
                      <label for="descripcion">Descripción</label>
                                           
                      </div>

                        <div class="col-md-6">
                               <label id="lbl_descripcion"> </label> 
                        </div>
                      </div>

                           <div class="row"> 
                                            
                      <div class="col-md-4">
                      <label for="lbl_file_name">Nombre del documento</label>
                                         
                      </div>

                        <div class="col-md-6">
                              <label id="lbl_file_name"> </label>    
                        </div>
                      </div>

   <div class="row"> 
                                            
                      <div class="col-md-4">
                      <label for="lbl_file_name">Creado por</label>
                                       
                      </div>

                        <div class="col-md-6">
                               <label id="lbl_user_name"> </label> 
                        </div>
                      </div>

                       </form>
          </div>  
                 

		</div>
	</div>


	@endslot

  	@slot('footer')  
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>       
	@endslot
  
@endcomponent
<!-- /modal -->

