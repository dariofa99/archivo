<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
 
      
@permission('crear_dependencias')
      <li class="nav_btn_estado">
      <a href="#" id="btn_nueva_dependencia" class="nav-link"> Nueva dependencia</a>
        
      </li>
    
    @endpermission
     
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