<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script type="text/javascript">
      $(document).ready(function(){
        $("#success-alert").hide();           
      });

    </script>

    <!-- Fonts -->
    
    @stack('css') 
      
    <style>
        .navbar-nav>li>.dropdown-menu { 
            
            width: 60px  !important;
        }
        body{
            overflow-x: hidden !important;
        } 
        .was-validated .form-control:invalid{border-color:#dc3545}    
        .invalid-feedback{width:100%;margin-top:.25rem;font-size:80%;color:#dc3545}  
        .img-responsive {
            width: 100%;
            height: auto;
        }
        .cursor_pointer {
          cursor: pointer;
        }
        .red_color {
          color: red;
        }
        .hidden {
            display: block;
        }
        .bold_font {
            font-weight: bold;
        }
        .float_left {
            float: left;
        }
        .float_right {
            float: right;
        }
        .white_text {
            color: #FFF;
        }
        .red_text {
            color: #FF0000;
        }
        .position_relative {
            position: relative;
        } 
        .footer-dark {
          padding:50px 0;
          color:#f0f9ff;
          background-color:#282d32;
        }

      .footer-dark h3 {
        margin-top:0;
        margin-bottom:12px;
        font-weight:bold;
        font-size:16px;
      }

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}   
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">    
    
</head>
<body>
    @yield('msg')
    <div id="app">
      <div class="row">
      <div class="col-md-4" >
        <div class="alert" id="success-alert" style="position: fixed;z-index: 1000;width: 100%; text-align: center">
          <button type="button" class="close" data-dismiss="alert">x</button>
          
        </div>
      </div>
    </div>
    <div class="container">      
            <nav class="navbar">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar" style="background: #C1C1C1"></span>
                    <span class="icon-bar" style="background: #C1C1C1"></span>
                    <span class="icon-bar" style="background: #C1C1C1"></span> 
                  </button>
                  <a class="navbar-brand" href="{{ url('/') }}">RRPS</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">                    
                    <li class="active"><a href="{{ url('/activities') }} ">News updates</a></li>
                    <li><a href="{{ url('/gallery')}}">Gallery</a></li>                     
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 83px; text-align: center">
                                <a href="{{ url('/profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" >
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                  </ul>
                </div>
              </div>
            </nav>
        </div>

        <main class="container" style="position: relative;top: -30px">
            @yield('content')
        </main>
        @section('footer')
            <div class="container" style="position: relative;z-index: 30;top: -20px">
              <div class="footer-dark">
                <footer>
                    <div class="container">
                        <div class="row">                    
                            <div class="col-md-12 col-sm-4 item social">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a></div>
                        </div>
                        <p class="copyright">Designed &amp; developed by Abhayjeet Singh</p>
                    </div>
                </footer>
              </div>
            </div>
        @show
    </div>
    @stack('js')    
</body>
</html>
