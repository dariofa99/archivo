@extends('layouts.dashboard')

@push('styles')
<!-- aqui van los estilos de cada vista -->
@endpush

@section('navbar')
<!-- aqui va el menu de cada vista -->
  @include('content.users.navbar')
@endsection

@section('content')
<div class="content-header">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- include('components.callout_info') -->

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-users"></i>
                  Actualizando perfil

                  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                

                </h3>
              </div>
              <div class="card-body">
   
                 <div class="container">
                  <div class="row">
                      <div class="col-md-3">
                      @permission('asig_dependencia')
                        <a href="#" id="btn_asignar_dependencia">
                   {{ (count($user->dependencias)>0) ? 'Cambiar dependencia': 'Asignar dependencia' }}
                        </a>
                        <br>
                      @endpermission                 
                         @permission('asig_rol')
                      <a href="#" id="btn_asignar_rol">
                       {{ (count($user->roles)>0) ? 'Cambiar rol': 'Asignar rol' }}
                  
                      </a>
                            <br>
                @endpermission

                         <a href="#" id="btn_cambiar_password">
                         Cambiar contraseña
                        </a>
                      </div>                    
                
                <div class="col-md-4">
                <form action="{{route('users.update',$user->id)}}" method="POST" id="myformEditUser">
               {{method_field('PATCH')}}
     {{ csrf_field() }}
<div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$user->name}}">                               
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{$user->email}}">                               
                            </div>

                            <div class="form-group">
                                <label for="direction">Dirección</label>
                                <input type="text" class="form-control form-control-sm" id="direccion" name="direccion" value="{{$user->direccion}}">                               
                            </div>

                            <div class="form-group">
                                <label for="telephone">Teléfono</label>
                                <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" value="{{$user->telefono}}">                               
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input disabled required type="password" class="form-control form-control-sm" id="password" name="password" value="">                               
                            </div>
                           


                             <button type="submit" class="btn btn-primary">Actualizar</button>


                </form>
                </div>
                <div class="col-md-4">
               
                            <div class="form-group">
                                <label for="password">Dependencia</label><br>
                                 @if(count($user->dependencias)>0)
                                {{ $user->dependencias[0]->nombre}}    
                                @else
                                Sin asignar
                                  @endif                          
                            </div>
                      

                            <div class="form-group">
                                <label for="password">Rol de usuario</label><br>
                                
                        @if(count($user->roles)>0)
                                {{$user->roles[0]->display_name}}
                                @else
                                Sin asignar
                                @endif 
                               
                            </div>
                        
                </div>
                </div>


            
              </div><!-- /.container -->

              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
@include('content.users.partials.modals.asignacion_dependencia')
@include('content.users.partials.modals.asignacion_rol')

@endsection

@push('scripts')
<!-- aqui van los scripts de cada vista -->
<script>
(function(){

$("#btn_asignar_dependencia").on('click',function(e){  
  $("#myModal_asignar_dependencia").modal('show');
  e.preventDefault();  
});

$("#btn_asignar_rol").on('click',function(e){  
  $("#myModal_asignar_rol").modal('show');
  e.preventDefault();  
});

$("#myformAsigDependen").on('submit',function(e){
  var data = $(this).serialize();
  var id = $("#myformAsigDependen input[name='user_id']").val();
  updateUser(data,id);
  e.preventDefault();

}); 

$("#myformAsigRol").on('submit',function(e){
  var data = $(this).serialize();
  var id = $("#myformAsigRol input[name='user_id']").val();
  updateUser(data,id);
  e.preventDefault();

}); 


$("#btn_cambiar_password").on('click',function(e){ 
  $("#myformEditUser input[name='password']").prop('disabled',! $("#myformEditUser input[name='password']").is(':disabled')) 
  e.preventDefault();  
});

})();


function updateUser(data,id){
   var route = "/admin/users/"+id ;       
        $.ajax({ 
        url: route,
        headers: { 'X-CSRF-TOKEN' : token },
        type:'PUT',
        datatype: 'json',
        data: data,
        cache: false,
        beforeSend: function(xhr){
          xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));   
        },
        success:function(res){
            console.log(res,'syn')
            window.location.reload()
          },
        error:function(xhr, textStatus, thrownError){
                    
            
        }
        });

}

</script>
@endpush

