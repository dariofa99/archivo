    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo 
        
        <a href="/home" class="brand-link">
          <img src="{{asset('css/img/logo.png')}}" alt="Logo Provecol" class="brand-image img-circle elevation-3"
              style="opacity: .8">
        </a>-->
        
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
        
        <div class="text-center">
          <a href="/home" class="">
          <img src="{{asset('css/img/logo.png')}}" alt="Logo Provecol" class="logo img-fluid" style="opacity: .8">
        </a>
        </div>
        <br><br>
        <hr>
        <!--Dependencias -->
        <div class="lbl_dependencia_sidebar">
        <h6> <strong>Dependencia:</strong>
          @if(count(Auth::user()->dependencias)>0)
            <small>{{Auth::user()->dependencias[0]->nombre}} </small>
          @endif </h6>
        </div>
        <hr>
        {{--  
          @if(count(Auth::user()->roles)>0)
            <small>
            {{Auth::user()->roles[0]->display_name}}
            </small>
          @endif
         <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="image">
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{Auth::user()->name}}</a>
              
                        <i class="fa fa-power-off" style="font-size:15px; color:red"></i>
                                        <a  href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Salir') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                  
            </div>
          </div>
          --}}
          <!-- Sidebar Menu -->

          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
            
            

              {{--  <li class="nav-item">
                <a href="{{route('archivos.show',1)}}" class="nav-link {{ (Request::is('tests') ? 'active' : '') }}">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>
                    Archivos
                    {{-- <span class="right badge badge-danger">New</span> 
                  </p>
                </a>
              </li> --}}
    @permission('ver_archivo')
                <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>
                    Archivo
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
            
          <ul class="nav nav-treeview" style="display:{{ (Request::is('carpetas/*') ? 'block': 'block')}}">
            
            @if(Auth::user()->hasDependencia())

          
            
            @forelse ($tipos_est as $ref)
    @if(($ref->ref_nombre == 'Histórico' and Auth::user()->can('ver_historico')) || ($ref->ref_nombre == 'Central' and Auth::user()->can('ver_central')) || ($ref->ref_nombre == 'Gestión' and Auth::user()->can('ver_gestion')))
                <li class="nav-item ">
                    <a href="/carpetas/{{$ref->id}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{$ref->ref_nombre}}</p>
                    </a>
                </li>
  @endif
                                @empty


                                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sin datos</p>
                    </a>
                </li>

              @endforelse  
    @else
    <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Falta asignar dependencia</p>
                    </a>
                </li>

              @endif
                  {{-- <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link {{(Request::is('admin/users') ? 'active' : '')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Usuarios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('roles.admin')}}" class="nav-link {{(Request::is('admin/*') ? 'active' : '')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roles y Permisos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/referencias/tipo')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tipos de documento</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/referencias/estado')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tipos de estado</p>
                    </a>
                  </li> --}}
              {{--     <li class="nav-item">
                    <a href="pages/layout/fixed-footer.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fixed Footer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Collapsed Sidebar</p>
                    </a>
                  </li> --}}
                </ul>
              </li>
    @endpermission   

    @permission('ver_administracion')
              <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Administración
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                @permission('ver_dependencias')
                  <li class="nav-item">
                    <a href="{{url('/dependencias')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dependencias</p>
                    </a>
                  </li>
                   @endpermission 
@permission('ver_tipos_documentales')
                  <li class="nav-item">
                    <a href="{{url('/referencias/tipo')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tipos documentales</p>
                    </a>
                  </li>
 @endpermission 
  @permission('ver_roles_permisos')
                  <li class="nav-item">
                    <a href="{{route('roles.admin')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roles y Permisos</p>
                    </a>
                  </li>
                  @endpermission 
                @permission('ver_usuarios')
                  <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Usuarios</p>
                    </a>
                  </li>
                  @endpermission 
                 
                   
                   
              {{--     <li class="nav-item">
                    <a href="pages/layout/fixed-footer.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fixed Footer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Collapsed Sidebar</p>
                    </a>
                  </li> --}}
                </ul>
              </li>
    @endpermission        
            
            
              
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>