@component('components.modal_dynamic')

	@slot('trigger')
		myModal_asignar_dependencia
	@endslot

	@slot('title')
		<h6><label id="lbl_modal_title">Asignando dependencia</label></h6>
	@endslot


	@slot('body')


 	<div class="row">
		<div class="col-md-6 offset-md-3">
		       
            <form id="myformAsigDependen" method="POST">
			<input type="hidden" value="{{$user->id}}" name="user_id" id="user_id">
            <select class="form-control" name="dependencia_id" id="dependencia_asig_id">
				@foreach ($dependencias as $key => $dependecia)
					<option value="{{$key}}">{{$dependecia}}</option>
				@endforeach
			</select>    
			<br>   
            <button type="submit" class="btn btn-primary btn-block">Asignar</button>

            </form>
         
		</div>
	</div>


	@endslot

  	@slot('footer')  
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>       
	@endslot
  
@endcomponent
<!-- /modal -->

