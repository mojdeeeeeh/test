<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('theme2/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('theme2/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
{{--   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
 --}}
  <!-- Bootstrap CSS File -->
  <link href="{{ asset('theme2/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('theme2/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('theme2/lib/animate/animate.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('theme2/css/style.css') }}" rel="stylesheet">

  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main2.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
  <!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="{{ asset('theme2/img/logo.png') }}" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{ Request::path() ==  'home#hero' ? 'active' : ''  }}"><a href="/home#hero">Home</a></li>
          <li class="{{ Request::path() ==  'home#about' ? 'active' : ''  }}"><a href="/home#about">About Us</a></li>
          <li class="{{ Request::path() ==  'home#services' ? 'active' : ''  }}"><a href="/home#services">Posts</a></li>
          <li class="{{ Request::path() ==  'home#portfolio' ? 'active' : ''  }}"><a href="/home#portfolio">Portfolio</a></li>
          <li class="{{ Request::path() ==  'home#team' ? 'active' : ''  }}"><a href="/home#team">Team</a></li>
          <li class="{{ Request::path() ==  'home#contact' ? 'active' : ''  }}"><a href="/home#contact">Contact Us</a></li>
          @guest
            <li><a href="{{ route('login') }}">Login</a></li>
          @endguest
          
          @auth
             <li><a href="/dashboard-1">Dashboard</a></li>
             <li>
               <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               Logout
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
               </form>
            </li>
          @endauth
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->

  <main id="main">

   @yield('content')
   
</main>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
        Bootstrap Templates by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('theme2/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('theme2/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('theme2/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('theme2/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('theme2/lib/wow/wow.min.js') }}"></script>
{{--   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
 --}}
  <script src="{{ asset('theme2/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('theme2/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('theme2/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('theme2/lib/superfish/superfish.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('theme2/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('theme2/js/main.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>

  @yield('scripts')

</body>
</html>


