@component('components.modal_dynamic')

	@slot('trigger')
		myModal_nuevo_archivo
	@endslot

	@slot('title')
		<h6><label id="lbl_modal_title">Nuevo Archivo</label></h6>
	@endslot


	@slot('body')


 	<div class="row">
		<div class="col-md-12">
		        <div class="card offset-md-1 col-md-10" id="content_form_archivo">
            
              <form id="myformNewArchivo" enctype="multipart/form-data" method="POST">
                   
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="codigo" id="codigo" value="">
                    <input type="hidden" name="carpeta_id" id="carpeta_id" value="{{$carpeta->id}}">
                    <input type="hidden" name="fecha" id="fecha" value="{{date('Y-m-d')}}">

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
                        <input class="form-control" type="text" name="nombre" id="nombre">
                     {{--    <br>
                        <label for="estado_id">Estado</label>
                        <select placeholder="Seleccione..." class="custom-select mr-sm-2 required" id="estado_id" name="estado_id">
                          <option value="">Seleccione...</option> 
                          @forelse ($tipos_est as $ref)
                                <option value="{{$ref->id}}"> {{$ref->ref_nombre}}</option> 
                            @empty
                               <option value="">Sin datos</option> 
                            @endforelse                 
                        </select>  --}}                
                        
                        <br>
                        <label for="documento_id">Tipo Archivo</label>
                        <select id="documento_id" name="documento_id" class="form-control">
                          <option selected>Seleccione...</option>
                          @forelse ($tipos_doc as $ref)
                                <option value="{{$ref->id}}"> {{$ref->ref_nombre}}</option> 
                            @empty
                               <option value="">Sin datos</option> 
                            @endforelse 
                        </select>
                        <br>
                        <label for="descripcion">Descripción</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion"> </textarea>
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

