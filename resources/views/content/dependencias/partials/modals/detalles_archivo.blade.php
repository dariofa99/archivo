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
            
              <form id="myformNewArchivo" enctype="multipart/form-data" method="POST">
                   
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
                          <td><label id="lbl_fecha" for="fecha">{{date('Y-m-d')}}</label></td>
                        </tr>
                      </tbody>
                    </table>    
                    
                      <hr>         
                      <div class="form-group offset-md-2 col-md-8">
                      
                        <label for="nombre">Nombre Archivo</label>
                        <label id="lbl_nombre"></label>
                         
                        <br>
                        <label for="documento_id">Tipo Archivo</label>
                        <label id="lbl_documento_id"></label>
                        <br>
                        <label for="descripcion">Descripción</label>
                        <label id="lbl_descripcion"> </label>
                        <br>
                         
                       <div class="custom-file">
                          <input type="file" class="custom-file-input" name="archivo" id="validatedCustomFile">
                          <label class="custom-file-label" id="lbl_nombre_archivo" for="validatedCustomFile">Seleccione un archivo...</label>
                          <div class="invalid-feedback">feedback</div>
                        </div> 
                        <br><br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar Archivo</button>
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

