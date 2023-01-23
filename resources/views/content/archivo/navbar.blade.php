
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
 
       <li class="nav_lbl_estado">

         <small>Archivo {{$carpeta->estado->ref_nombre}}</small>
        
      </li>
@if(count(Auth::user()->dependencias)>0)
@permission('crear_archivos')
      <li class="nav_btn_estado">
      <a href="#" id="btn_nuevo_archivo" class="nav-link"> Nuevo archivo</a>        
      </li>
      @endpermission
      <div></div>
      @permission('crear_carpetas')
      <li class="nav_btn_estado">
      <a href="#" id="btn_nueva_carpeta" class="nav-link">Nueva carpeta</a>
        
      </li>
       @endpermission
  @endif   
    </ul>

    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
-->
<!-- Right navbar links -->
   @include('content.navbar_right') 


  </nav>