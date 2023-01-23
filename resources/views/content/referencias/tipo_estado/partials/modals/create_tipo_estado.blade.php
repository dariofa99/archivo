@component('components.modal_dynamic')

	@slot('trigger')
		myModal_nuevo_tipo_estado
	@endslot

	@slot('title')
		<h5><label id="lbl_modal_title">Detalles Asignaciones</label></h5>
	@endslot

	@slot('size')
	modal-lg
	@endslot

	@slot('body')


@section('msg-contenido')
Registrado
@endsection

 	<div class="row">
		<div class="col-md-12">
		<div class="box-body">
		<div class="content_component" id="content_component_form">
         
              <div class="row">
                <div class="card offset-3 col-6">
                  <form id="myformNuevoTipoEstado">
                   <input type="hidden"  name="id" id="id">
                  
                      <div class="form-group col-md-12">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control required" name="ref_nombre" id="ref_nombre" placeholder="Nombre nuevo estado">
                      </div>

                      <div class="form-group col-md-12">
                        <label for="duracion">Duración del estado (años)</label>
                        <select placeholder="Seleccione" class="custom-select mr-sm-2 required" id="duracion" name="duracion">
                          <option value="">Seleccione...</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>
                      </div>
                    
                    <div class="form-group col-md-12">
                      <hr>
                    <label for="duracion">Pasar al siguiente estado</label>
                        <select placeholder="Seleccione..." class="custom-select mr-sm-2 required" id="siguiente_estado" name="siguiente_estado">
                          <option value="">Seleccione...</option> 
                          @forelse ($tipos_est as $ref)
                           
                                <option value="{{$ref->id}}"> {{$ref->ref_nombre}}</option> 
                           
                            @empty
                               <option value="1">Historico</option> 
                            @endforelse                 
                        </select>                 
                        
                      </div>

                      <div class="form-group col-md-12">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control required" id="descripcion" name="descripcion" rows="3" placeholder=""></textarea>
                      </div>
                      <div class="text-center">
                      <input class="btn btn-primary" type="submit" value="Enviar">
                      <br><br>
                      </div>
                  </form>
                </div>
              </div>
        
        </div>
			</div>
	@slot('footer')
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>       
	@endslot

		</div>
	</div>


	@endslot
@endcomponent
<!-- /modal -->










