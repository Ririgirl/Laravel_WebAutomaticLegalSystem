<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WebLawyer @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style-responsive.css') }}" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<style>
  .logo > a, .social-index > li > a {
      font-size:13px;
      color:#8d8d8d;
      font-family: 'Raleway', sans-serif;
      font-size:14px;
      text-decoration: none;
    }
</style>
<body>
  <!--Preloader-->
  <div class="preloader" id="preloader">
    <div class="item">
      <div class="spinner">
      </div>
    </div>
  </div>
  <header class="boxed" id="header-white">

  <!--Header-->
  <div class="header-margin"> 
  
    <div class="logo"><a class="ajax-link" href="{{ url('/') }}">
                    {{ config('app.name', 'WebLawyer') }}</div>
    <!--Header-->
    <!-- Authentication Links -->
    @guest
    <ul class="social-icon">
      <div class="social-index">
                            <li >
                                <a href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li >
                                    <a href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                          </ul>
                          </div>
                        @else
                        <ul class="header-nav">
                          <li><a class="ajax-link" href="projects.html">Projects</a>
                              <ul>
                                <li><a class="ajax-link" href="projects.html">Projects</a></li> 
                                <li><a class="ajax-link" href="single.html">Single project</a></li> 
                                <li><a class="ajax-link" href="single-full.html">Single project fullscreen</a></li> 
                                         
                              </ul>
                            
                            </li>
                            
                            <li><a class="ajax-link" href="about-me.html">About me</a></li>
                            <li><a class="ajax-link" href="contact.html">Contact</a></li>
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('card') }}">
                                          {{ __('Корзина') }}
                                          <span class='badge'>{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                      </a>
                                      <a class="dropdown-item" href="{{ route('home') }}">
                                          {{ __('Личный кабинет') }}
                                      </a>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Выход') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          </ul>
                        @endguest
      
    
  </div>

</header>

<div class="clear"></div>
<!--Content-->
  <div class="content" id="ajax-content">  
    <div class="text-intro" id="site-type">    
    @yield('content')
    </div>
  </div>

<!--Footer-->

<footer id="footer-box">
  <div class="footer-margin"> 
  <div class="copyright" id="footer-left">© Copyright 2019 WebLayer.ru. All Rights Reserved.</div>
  </div>
</footer>

<!--Scripts-->

  <script src="{{ URL::asset('js/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('js/js/jquery.easing.min.js') }}"></script>
  <script src="{{ URL::asset('js/js/modernizr.custom.42534.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/js/jquery.waitforimages.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/js/typed.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/js/masonry.pkgd.min.js') }}" type="text/javascript"></script>  
  <script src="{{ URL::asset('js/js/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>    
  <script src="{{ URL::asset('js/js/jquery.jkit.1.2.16.min.js') }}"></script>
  <script src="{{ URL::asset('js/js/script.js') }}" type="text/javascript"></script>

</body>
</html>
