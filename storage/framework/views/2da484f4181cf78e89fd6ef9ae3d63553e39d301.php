<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agile AX</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('assets/vendor/bootstrap-4.1/bootstrap.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>" rel="stylesheet" media="all">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('assets/css/full-slider.css')); ?>" rel="stylesheet">
    <!-- Styles -->
        <style>
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
    </style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bgg-dark fixed-top" style="box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);>
      <div class="container">
         <a class="logo" href="index.html">
            <img src="<?php echo e(asset('assets/images/icon/logo-blue.png')); ?>" alt="X-flow" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto" style="font-weight: 700;font-size: 16px;">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo e(url('/')); ?>"><i class="fas fa-home"></i>&nbsp Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-address-card"></i>&nbsp About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/register')); ?>"><i class="fas fa-user-plus"></i>&nbsp Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/login')); ?>"><i class="fas fa-user"></i>&nbsp Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-phone"></i>&nbsp Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 95%;margin: auto;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo e(asset('assets/images/slider/s1.jpg')); ?>')">
            <div class="carousel-caption d-none d-md-block">
             
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('assets/images/slider/s2.jpg')); ?>')">
            <div class="carousel-caption d-none d-md-block">
             
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('assets/images/slider/s3.jpg')); ?>')">
            <div class="carousel-caption d-none d-md-block">
             
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h3>Overview</h3>
Welcome to the ComplianceWorks Administration Tool (CAT). CAT is a business intelligence tool that streamlines your compliance program while providing support to Investment Advisors, Private (Hedge) Funds, Private Equity and Broker Dealers. CAT in combination with your ComplianceWorks representative will ensure that the firm’s entire compliance program remains on point and up to date.
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; AgileAX 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('assets/vendor/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap-4.1/bootstrap.bundle.min.js')); ?>"></script>
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  </body>

</html>
