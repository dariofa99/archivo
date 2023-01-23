<ul class="navbar-nav ml-auto">
        <div class="dropdown-menu-right">
        <div class="row justify-content-start">
          <div class="col-6 nav_info_user_right"  style="line-height:20px">
    
              {{--<img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" style="width:25px; margin:auto;">--}}
              <span>
              <a href="/admin/users/{{Auth::user()->id}}/edit" style="padding-left:10px" >{{Auth::user()->name}}</a>
              @if(count(Auth::user()->roles)>0)
              <small>
              {{Auth::user()->roles[0]->display_name}}
              </small>
              @endif </span>
          </div>
          <div class="col-6">  
          <div class="btn btn-default">
            <i class="fa fa-power-off" style="font-size:13px; color:red"></i>
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
        </div>
        </div>
</ul>