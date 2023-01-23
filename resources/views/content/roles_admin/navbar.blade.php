<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
      @permission('asig_rol_permisos')
      <li class="nav-item d-none d-sm-inline-block nav_btn_estado">
        <a href="{{url('/admin/asig')}}" class="nav-link">Asignaciónes</a>
      </li>
  @endpermission
   @permission('ver_roles')
      <li class="nav-item d-none d-sm-inline-block nav_btn_estado">
        <a href="{{url('/admin/roles')}}" class="nav-link">Roles</a>
      </li>
       @endpermission
 @permission('crear_permisos')
      <li class="nav-item d-none d-sm-inline-block nav_btn_estado">
        <a href="{{url('/admin/permisos')}}" class="nav-link">Permisos</a>
      </li>
      @endpermission
    </ul>
 
    <!-- SEARCH FORM -->
   {{--  <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
   @include('content.navbar_right')


  </nav>