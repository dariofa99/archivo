@component('components.modal_dynamic')

	@slot('trigger')
		myModal_create_user
	@endslot

	@slot('title')
		<h6><label id="lbl_modal_title">Nuevo usuario</label></h6>
	@endslot


	@slot('body')


 	<div class="row">
		<div class="col-md-6 offset-md-3">
		       
         <form action="{{route('users.store')}}" method="POST" id="myformCreateUser">
             
     {{ csrf_field() }}
<div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" required class="form-control form-control-sm" id="name" name="name" value="">                               
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" required class="form-control form-control-sm" id="email" name="email" value="">                               
                            </div>

                            <div class="form-group">
                                <label for="direction">Dirección</label>
                                <input type="text" required class="form-control form-control-sm" id="direccion" name="direccion" value="">                               
                            </div>

                            <div class="form-group">
                                <label for="telephone">Teléfono</label>
                                <input type="text" required class="form-control form-control-sm" id="telefono" name="telefono" value="">                               
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input  required type="password" class="form-control form-control-sm" id="password" name="password" value="">                               
                            </div>
                            <div class="form-group">
                                <label for="password">Dependencia</label>
                                    <select class="form-control" required name="dependencia_id" id="dependencia_asig_id">
                                         <option value="">Seleccione...</option>
                                        @foreach ($dependencias as $key => $dependecia)
                                            <option value="{{$key}}">{{$dependecia}}</option>
                                        @endforeach
                                    </select>   
                            </div>
                            <div class="form-group">
                            <label for="password">Rol</label>
                            <select class="form-control" required name="rol_id" id="rol_asig_id">
                             <option value="">Seleccione...</option>
                                @foreach ($roles as $key => $rol)
                                    <option value="{{$key}}">{{$rol}}</option>
                                @endforeach
                            </select>    
                            </div>
                           
                           

                             <button type="submit" class="btn btn-primary">Crear</button>


                </form>
         
		</div>
	</div>


	@endslot

  	@slot('footer')  
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>       
	@endslot
  
@endcomponent
<!-- /modal -->

