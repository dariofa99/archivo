@component('components.modal_dynamic')

	@slot('trigger')
		myModal_nueva_carpeta
	@endslot

	@slot('title')
		<h5><label>Nueva carpeta</label></h5>
	@endslot


	@slot('body')


 	<div class="row">
		<div class="offset-md-3 col-md-6">
	<form id="myformNewCarpeta" method="POST">

	 		<input type="hidden" value="{{$carpeta->id}}" name="carpeta_padre_id" id="carpeta_padre_id">
          	<input type="hidden" id="estado_id" name="estado_id" value="{{$carpeta->estado->id}}">

                         
                      <div class="form-group col-md-12">
                        <label for="nombre">Nombre carpeta</label>
                        <input type="text" class="form-control required"  name="nombre" id="nombre" placeholder="Nombre">
                      </div>
                      <div class="text-center">
                      <input class="btn btn-primary" type="submit" value="Enviar">
                      <br><br>
                      </div>
    </form>
   

		</div>
	</div>


	@endslot

  	@slot('footer')  
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>       
	@endslot
  
@endcomponent
<!-- /modal -->

