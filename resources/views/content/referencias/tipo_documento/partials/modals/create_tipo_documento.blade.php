@component('components.modal_dynamic')

	@slot('trigger')
		myModal_nuevo_tipo_doc
	@endslot

	@slot('title')
		<h5><label id="lbl_modal_title">Nuevo tipo de documento</label></h5>
	@endslot

	@slot('body')


 	<div class="row justify-content-md-center">
		<div class="col-md-6">
		<div class="box-body">
		<div class="content_component_form  no-padding" id="content_component_form">
         
              <div class="row">
                <div class="card col-12">
                  <form id="myformNuevoTipoDoc">
                  <input type="hidden" id="id" name="id">
                      <div class="form-group col-md-12">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control required"  name="ref_nombre" id="nombre" placeholder="Nombre">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control required" name="descripcion"  id="descripcion" rows="3" placeholder="Descripción"></textarea>
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
       <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>       
	@endslot

		</div>
	</div>


	@endslot
@endcomponent
<!-- /modal -->










