<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agile AX</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/full-slider.css') }}" rel="stylesheet">
    <!-- Styles -->
        <style>
        .service-heading{
          padding-top: 23px;
        }
        li.nav-item {
    padding-left: 20px;
    padding-right: 20px;
    }
           .carousel-item {
                height: 461px;
                margin-top: 72px;
    }
    .bgg-dark {
    background-color: #ffffff!important;
    }
    .navbar-dark .navbar-nav .nav-link {
    color: #555;
    }
    .navbar-dark .navbar-nav .active>.nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show>.nav-link {
    color: #4272d7;
    }
    .carousel-control-next:focus, .carousel-control-next:hover, .carousel-control-prev:focus, .carousel-control-prev:hover {
    color: #242424;
    text-decoration: none;
    outline: 0;
    opacity: .9;
    }
    .ml-auto, .mx-auto {
    margin-left: auto!important;
    margin-right: 100px;
    }
    .navbar-dark .navbar-nav .nav-link:hover {
    color: rgba(25, 21, 21, 0.75);
    }
    @media only screen and (max-width: 600px) {
      .carousel-item {
                  height: 30px;
                  margin-top: 72px;
                  min-height: 130px;
      }
    }
    @media only screen and (min-width: 610px) and (max-width: 768px){
        .carousel-item {
                  height: 30px;
                  margin-top: 72px;
                  min-height: 270px;
      }
    }
}
    </style>
   
</head>
<body class="animsition">
    <nav class="navbar navbar-expand-lg navbar-dark bgg-dark fixed-top" style="box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);>
      <div class="container">
         <a class="logo" href="index.html">
            <img src="{{ asset('assets/images/icon/logo-blue.png') }}" alt="X-flow" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #000000fa;">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto" style="font-weight: 700;font-size: 16px;">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i>&nbsp Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-address-card"></i>&nbsp About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/register') }}"><i class="fas fa-user-plus"></i>&nbsp Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/login') }}"><i class="fas fa-user"></i>&nbsp Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-phone"></i>&nbsp Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page-container" style="margin-top: 200px;margin-bottom: 200px;">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>    
    <footer class="py-5 bg-dark">
      <div class="container">
        <!-- <p class="m-0 text-center text-white">Copyright &copy; AgileAX 2018</p> -->
         <div class="row">
          <div class="col-md-6">
            <span class="copyright text-white">Copyright &copy; AgileAX 2018</span>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter text-white"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f text-white"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in text-white"></i>
                </a>
              </li>
            </ul>
          </div>
          
        </div>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-4.1/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
