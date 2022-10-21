<!doctype html>
<html >

  <head>
  	<title>CSJSGB</title>
    <meta charset="utf-8">
    <meta >
 
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch ">
			<nav id="sidebar">
				<div class="custom-menu shadow mt-4">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
        @guest
                        
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else 
        
	  		<div class="img bg-wrap text-center py-4 " style="background-image: url({{ asset('images/bg_1.jpg') }});">
	  			<div class="user-logo">
                  <h3>CSJSGB</h3>                 
	  				<div class="img" style="background-image: url({{ asset('images/csj.png ') }});"></div>
	  				<b>Usuario</b> {{ Auth::user()->name }}
	  			</div>
                  @endguest
	  		</div>
              @admin (session('status'))
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span>Inicio</a>
          </li>
          <li>
              <a href="{{ route('users.index') }}"><span class="fa fa-users mr-3 notif"></span>Usuarios</a>
          </li>
          <li>
            <a href="{{ route('periodos.index') }}"><span class="fa fa-calendar mr-3"></span>Períodos</a>
          </li>
          <li>
            <a href="{{ route('cursos.index') }}"><span class="fa fa-cog mr-3"></span>Cursos</a>
          </li>
          <li>
            <a href="{{ route('postulants.index') }}"><span class="fa fa-user mr-3"></span> Postulantes</a>
          </li>
          
          <li>
            
          <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                             <i class='fa fa-sign-out mr-3'></i> <span class="nav_name">   {{ __('Salir') }}</span>
                                             </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            
                                                   @csrf
                                                 </form>
          </li>
        </ul>
        @endadmin
        @secre (session('status'))
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span>Inicio</a>
          </li>
          
          <li>
            <a href="{{ route('postulants.index') }}"><span class="fa fa-user mr-3"></span> Postulantes</a>
          </li>
          
          <li>
            
          <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                             <i class='fa fa-sign-out mr-3'></i> <span class="nav_name">   {{ __('Salir') }}</span>
                                             </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            
                                                   @csrf
                                                 </form>
          </li>
        </ul>
        @endsecre
        @beca (session('status'))
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span>Inicio</a>
          </li>
          
          <li>
            <a href="{{ route('postulants.index') }}"><span class="fa fa-user mr-3"></span> Postulantes</a>
          </li>
          
          <li>
            
          <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                             <i class='fa fa-sign-out mr-3'></i> <span class="nav_name">   {{ __('Salir') }}</span>
                                             </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            
                                                   @csrf
                                                 </form>
          </li>
        </ul>
        @endbeca
        @user (session('status'))
        <ul class="list-unstyled components mb-5"> 
        <li class="active">
            <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span>Inicio</a>
          </li>        
          <li>
            <a href="{{ route('postulants.index') }}"><span class="fa fa-user mr-3"></span> Postular</a>
          </li>
         
          <li>
            
          <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                             <i class='fa fa-sign-out mr-3'></i> <span class="nav_name">   {{ __('Salir') }}</span>
                                             </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            
                                                   @csrf
                                                 </form>
          </li>
        </ul>
        @enduser
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">        
      @yield('content')
      </div>
		</div>

    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    
  </body>
</html>