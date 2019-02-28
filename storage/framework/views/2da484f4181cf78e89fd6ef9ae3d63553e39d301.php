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
    <!-- <link href="<?php echo e(asset('assets/css/full-slider.css')); ?>" rel="stylesheet"> -->
    <!-- Styles -->
        <!-- <style>
        .service-heading{
          padding-top: 23px;
        }
        li.nav-item {
    padding-left: 20px;
    padding-right: 20px;
    }
           .carousel-item {
                height: 461px;
                margin-top: 70px;
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
    .carousel-caption {
    position: absolute;
        /* right: 15%; */
        /* bottom: 20px; */
        left: 7%;
        z-index: 10;
        padding-top: 57px;
        padding-left: 20px;
        /* padding-bottom: 20px; */
        color: #fff;
        text-align: center;
    }
    @media  only screen and (max-width: 600px) {
      .carousel-item {
                  height: 30px;
                  margin-top: 72px;
                  min-height: 130px;
      }
    }
    @media  only screen and (min-width: 610px) and (max-width: 768px){
        .carousel-item {
                  height: 30px;
                  margin-top: 72px;
                  min-height: 270px;
      }
    }
}
    </style> -->
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
                margin-top: 70px;
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
@font-face {
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/polar.otf");
  font-family: 'Polar';
}
*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html, body {
  font-size: 62.5%;
  height: 100%;
  overflow: hidden;
}

body {
  background: #000;
}

svg {
  display: block;
  overflow: visible;
}

.slider-container {
  position: relative;
  height: 100%;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  cursor: all-scroll;
}

.slider-control {
  z-index: 2;
  position: absolute;
  top: 0;
  width: 12%;
  height: 100%;
  transition: opacity 0.3s;
  will-change: opacity;
  opacity: 0;
}
.slider-control.inactive:hover {
  cursor: auto;
}
.slider-control:not(.inactive):hover {
  opacity: 1;
  cursor: pointer;
}
.slider-control.left {
  left: 0;
  background: linear-gradient(to right, rgba(0, 0, 0, 0.18) 0%, rgba(0, 0, 0, 0) 100%);
}
.slider-control.right {
  right: 0;
  background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.18) 100%);
}

.slider-pagi {
  position: absolute;
  z-index: 3;
  left: 50%;
  bottom: 2rem;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  font-size: 0;
  list-style-type: none;
}
.slider-pagi__elem {
  position: relative;
  display: inline-block;
  vertical-align: top;
  width: 2rem;
  height: 2rem;
  margin: 0 0.5rem;
  border-radius: 50%;
  border: 2px solid #fff;
  cursor: pointer;
}
.slider-pagi__elem:before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  width: 1.2rem;
  height: 1.2rem;
  background: #fff;
  border-radius: 50%;
  transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transition: transform 0.3s, -webkit-transform 0.3s;
  -webkit-transform: translate(-50%, -50%) scale(0);
          transform: translate(-50%, -50%) scale(0);
}
.slider-pagi__elem.active:before, .slider-pagi__elem:hover:before {
  -webkit-transform: translate(-50%, -50%) scale(1);
          transform: translate(-50%, -50%) scale(1);
}

.slider {
  z-index: 1;
  position: relative;
  height: 100%;
}
.slider.animating {
  transition: -webkit-transform 0.5s;
  transition: transform 0.5s;
  transition: transform 0.5s, -webkit-transform 0.5s;
  will-change: transform;
}
.slider.animating .slide__bg {
  transition: -webkit-transform 0.5s;
  transition: transform 0.5s;
  transition: transform 0.5s, -webkit-transform 0.5s;
  will-change: transform;
}

.slide {
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.slide.active .slide__overlay,
.slide.active .slide__text {
  opacity: 1;
  -webkit-transform: translateX(0);
          transform: translateX(0);
}
.slide__bg {
  position: absolute;
  top: 0;
  left: -50%;
  width: 100%;
  height: 100%;
  margin-top: 62px;
  background-size: cover;
  will-change: transform;
}
.slide:nth-child(1) {
  left: 0;
}
.slide:nth-child(1) .slide__bg {
  left: 0;
  background-image: url("/assets/images/slider/hd1.png");
}
.slide:nth-child(1) .slide__overlay-path {
  fill: #e99c7e;
}
@media (max-width: 991px) {
  .slide:nth-child(1) .slide__text {
    background-color: rgba(233, 156, 126, 0.8);
  }
}
.slide:nth-child(2) {
  left: 100%;
}
.slide:nth-child(2) .slide__bg {
  left: -50%;
  background-image: url("/assets/images/slider/hd2.png");
}
.slide:nth-child(2) .slide__overlay-path {
  fill: #e1ccae;
}
@media (max-width: 991px) {
  .slide:nth-child(2) .slide__text {
    background-color: rgba(225, 204, 174, 0.8);
  }
}
.slide:nth-child(3) {
  left: 200%;
}
.slide:nth-child(3) .slide__bg {
  left: -100%;
  background-image: url("/assets/images/slider/hd3.png");
}
.slide:nth-child(3) .slide__overlay-path {
  fill: #adc5cd;
}
@media (max-width: 991px) {
  .slide:nth-child(3) .slide__text {
    background-color: rgba(173, 197, 205, 0.8);
  }
}
.slide:nth-child(4) {
  left: 300%;
}
.slide:nth-child(4) .slide__bg {
  left: -150%;
  background-image: url("/assets/images/slider/hd4.png");
}
.slide:nth-child(4) .slide__overlay-path {
  fill: #cbc6c3;
}
@media (max-width: 991px) {
  .slide:nth-child(4) .slide__text {
    background-color: rgba(203, 198, 195, 0.8);
  }
}

.slide:nth-child(5) {
  left: 400%;
}
.slide:nth-child(5) .slide__bg {
  left: -200%;
  background-image: url("/assets/images/slider/hd5.png");
}
.slide:nth-child(5) .slide__overlay-path {
  fill: #4950d8;
}
@media (max-width: 991px) {
  .slide:nth-child(5) .slide__text {
    background-color: rgba(225, 204, 174, 0.8);
  }
}
.slide__content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.slide__overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 100%;
  min-height: 810px;
  transition: opacity 0.2s 0.5s, -webkit-transform 0.5s 0.5s;
  transition: transform 0.5s 0.5s, opacity 0.2s 0.5s;
  transition: transform 0.5s 0.5s, opacity 0.2s 0.5s, -webkit-transform 0.5s 0.5s;
  will-change: transform, opacity;
  -webkit-transform: translate3d(-20%, 0, 0);
          transform: translate3d(-20%, 0, 0);
  opacity: 0;
}
@media (max-width: 991px) {
  .slide__overlay {
    display: none;
  }
}
.slide__overlay path {
  opacity: 0.8;
}
.slide__text {
  position: absolute;
  width: 25%;
  bottom: 15%;
  left: 12%;
  color: #fff;
  transition: opacity 0.5s 0.8s, -webkit-transform 0.5s 0.8s;
  transition: transform 0.5s 0.8s, opacity 0.5s 0.8s;
  transition: transform 0.5s 0.8s, opacity 0.5s 0.8s, -webkit-transform 0.5s 0.8s;
  will-change: transform, opacity;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  opacity: 0;
}
@media (max-width: 991px) {
  .slide__text {
    left: 0;
    bottom: 0;
    width: 100%;
    height: 20rem;
    text-align: center;
    -webkit-transform: translateY(50%);
            transform: translateY(50%);
    transition: opacity 0.5s 0.5s, -webkit-transform 0.5s 0.5s;
    transition: transform 0.5s 0.5s, opacity 0.5s 0.5s;
    transition: transform 0.5s 0.5s, opacity 0.5s 0.5s, -webkit-transform 0.5s 0.5s;
    padding: 0 1rem;
  }
}
.slide__text-heading {
  font-family: Helvetica, Arial, sans-serif;
  font-size: 5rem;
  margin-bottom: 2rem;
}
@media (max-width: 991px) {
  .slide__text-heading {
    line-height: 20rem;
    font-size: 3.5rem;
  }
}
.slide__text-desc {
  font-family: "Open Sans", Helvetica, Arial, sans-serif;
  font-size: 1.8rem;
  margin-bottom: 1.5rem;
}
@media (max-width: 991px) {
  .slide__text-desc {
    display: none;
  }
}
.slide__text-link {
  z-index: 5;
  display: inline-block;
  position: relative;
  padding: 0.5rem;
  cursor: pointer;
  font-family: "Open Sans", Helvetica, Arial, sans-serif;
  font-size: 2.3rem;
  -webkit-perspective: 1000px;
          perspective: 1000px;
}
@media (max-width: 991px) {
  .slide__text-link {
    display: none;
  }
}
.slide__text-link:before {
  z-index: -1;
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #000;
  -webkit-transform-origin: 50% 100%;
          transform-origin: 50% 100%;
  -webkit-transform: rotateX(-85deg);
          transform: rotateX(-85deg);
  transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transition: transform 0.3s, -webkit-transform 0.3s;
  will-change: transform;
}
.slide__text-link:hover:before {
  -webkit-transform: rotateX(0);
          transform: rotateX(0);
}

</style>

  </head>

  <body style="overflow: scroll;overflow-x: hidden;">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bgg-dark fixed-top" style="box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);"">
      <div class="container">
         <a class="logo" href="index.html">
            <img src="<?php echo e(asset('assets/images/icon/logo-blue.png')); ?>" alt="X-flow" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #000000fa;">
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
      <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 95%;margin: auto;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          
          <div class="carousel-item active" style="background-image: url('<?php echo e(asset('assets/images/slider/h1.png')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h4>This is the test.</h4>
              <p>This is the test.This is the test.This is the test.</p>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('assets/images/slider/h2.png')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h4>This is the test.</h4>
              <p>This is the test.This is the test.This is the test.</p>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('assets/images/slider/h3.png')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h4>This is the test.</h4>
              <p>This is the test.This is the test.This is the test.</p>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('assets/images/slider/h4.png')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h4>This is the test.</h4>
              <p>This is the test.This is the test.This is the test.</p>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('assets/images/slider/h5.png')); ?>')">
            <div class="carousel-caption d-none d-md-block">
             <h4>This is the test.</h4>
              <p>This is the test.This is the test.This is the test.</p>
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
      </div> -->

    </header>
    <div class="slider-container">
  <div class="slider-control left">left</div>
  <div class="slider-control right">right</div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Executive Calender</h2>
          <p class="slide__text-desc">The Executive Calendar provides insight on tasks deemed important. The tasks that are being displayed are related to the users assigned. The executive can drill down on a task amd make edits as necessary. If a task requires long term management a xflow can be assigned.</p>
          <!-- <a class="slide__text-link">Project link</a> -->
        </div>
      </div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Workflow Tool</h2>
          <p class="slide__text-desc">The workflow tool streamlines task procedures by displaying an orchestrated pattern of business activity. It provides instant oversight to ensure business procedures are followed. It also process real time status of an item as well as potential bottlenecks of risk, so the person responsible can mitigate.</p>
          
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Checklists</h2>
          <p class="slide__text-desc">Checklists ensures conststency and completeness in carrying out a task. A user can create a template for each checklists to elimimate duplicate efforts. A user can quickly review the list and determine which tasks are priority denoted by the star and which tasks have subtasks. Each checklist can be setup for a user to execute or assign to another user.</p>
          
        </div>
      </div>
    </div>
    <div class="slide slide-3">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Job Portal</h2>
          <p class="slide__text-desc">The Job Portal automates the overall process of identifying the right candidate, scheduling the interviews and tracking the history throughout the process. At any time in the process the administrator can review status from the candidate or client perspecitive.</p>
          
        </div>
      </div>
    </div>
    <div class="slide slide-4">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project Tools</h2>
          <p class="slide__text-desc">The Project tool facilitates a more efficient methodology for handling big tasks consistently and with very minimum oversite. Tasks can be defined with a cutom designed templates or on case by case basis. Status is tracked throughout the life cycle of the project on a dashboard.</p>
          
        </div>
      </div>
    </div>
  </div>
</div>


    <!-- Page Content -->
     <!-- Services -->
    <!-- <section id="services" class="py-5">
      <div class="container">
        <div class="row" style="margin-bottom: 40px;">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Compliance Works Administration Tool</h2>
            <h5 class="section-subheading text-muted">Compliance program for Investment Advisors, Private (Hedge) Funds, Private Equity and Broker Dealers.</h5>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-tasks fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Task Management</h4>
            <p class="text-muted">The only tool you need for task management and lists. Organize everything you need to keep track of individual and team tasks.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-cogs fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">X-flow</h4>
            <p class="text-muted">For building, executing and managing business processes and workflows. It is a basis for building collaborative applications as well as integrating processes across an enterprise</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-map-signs fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Checklists</h4>
            <p class="text-muted">Create recurring checklists, workflows and standard operating procedures in project is a simple, free and powerful way to manage your work</p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <h3>Overview</h3>
Welcome to the ComplianceWorks Administration Tool (CAT). CAT is a business intelligence tool that streamlines your compliance program while providing support to Investment Advisors, Private (Hedge) Funds, Private Equity and Broker Dealers. CAT in combination with your ComplianceWorks representative will ensure that the firm’s entire compliance program remains on point and up to date.
      </div>
    </section> -->

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="padding-bottom: 1rem!important;padding-top: 2rem!important;font-size: medium;">
      <div class="container">
        <!-- <p class="m-0 text-center text-white">Copyright &copy; AgileAX 2018</p> -->
         <div class="row">
          <div class="col-md-6" style="width: 50%;">
            <span class="copyright text-white">Copyright &copy; AgileAX 2018</span>
          </div>
          <div class="col-md-6" style="text-align: right;width: 50%;">
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
    <script src="<?php echo e(asset('assets/vendor/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap-4.1/bootstrap.bundle.min.js')); ?>"></script>
    <script>
     $(document).ready(function() {
  
  var $slider = $(".slider"),
      $slideBGs = $(".slide__bg"),
      diff = 0,
      curSlide = 0,
      numOfSlides = $(".slide").length-1,
      animating = false,
      animTime = 500,
      autoSlideTimeout,
      autoSlideDelay = 6000,
      $pagination = $(".slider-pagi");
  
  function createBullets() {
    for (var i = 0; i < numOfSlides+1; i++) {
      var $li = $("<li class='slider-pagi__elem'></li>");
      $li.addClass("slider-pagi__elem-"+i).data("page", i);
      if (!i) $li.addClass("active");
      $pagination.append($li);
    }
  };
  
  createBullets();
  
  function manageControls() {
    $(".slider-control").removeClass("inactive");
    if (!curSlide) $(".slider-control.left").addClass("inactive");
    if (curSlide === numOfSlides) $(".slider-control.right").addClass("inactive");
  };
  
  function autoSlide() {
    autoSlideTimeout = setTimeout(function() {
      curSlide++;
      if (curSlide > numOfSlides) curSlide = 0;
      changeSlides();
    }, autoSlideDelay);
  };
  
  autoSlide();
  
  function changeSlides(instant) {
    if (!instant) {
      animating = true;
      manageControls();
      $slider.addClass("animating");
      $slider.css("top");
      $(".slide").removeClass("active");
      $(".slide-"+curSlide).addClass("active");
      setTimeout(function() {
        $slider.removeClass("animating");
        animating = false;
      }, animTime);
    }
    window.clearTimeout(autoSlideTimeout);
    $(".slider-pagi__elem").removeClass("active");
    $(".slider-pagi__elem-"+curSlide).addClass("active");
    $slider.css("transform", "translate3d("+ -curSlide*100 +"%,0,0)");
    $slideBGs.css("transform", "translate3d("+ curSlide*50 +"%,0,0)");
    diff = 0;
    autoSlide();
  }

  function navigateLeft() {
    if (animating) return;
    if (curSlide > 0) curSlide--;
    changeSlides();
  }

  function navigateRight() {
    if (animating) return;
    if (curSlide < numOfSlides) curSlide++;
    changeSlides();
  }

  $(document).on("mousedown touchstart", ".slider", function(e) {
    if (animating) return;
    window.clearTimeout(autoSlideTimeout);
    var startX = e.pageX || e.originalEvent.touches[0].pageX,
        winW = $(window).width();
    diff = 0;
    
    $(document).on("mousemove touchmove", function(e) {
      var x = e.pageX || e.originalEvent.touches[0].pageX;
      diff = (startX - x) / winW * 70;
      if ((!curSlide && diff < 0) || (curSlide === numOfSlides && diff > 0)) diff /= 2;
      $slider.css("transform", "translate3d("+ (-curSlide*100 - diff) +"%,0,0)");
      $slideBGs.css("transform", "translate3d("+ (curSlide*50 + diff/2) +"%,0,0)");
    });
  });
  
  $(document).on("mouseup touchend", function(e) {
    $(document).off("mousemove touchmove");
    if (animating) return;
    if (!diff) {
      changeSlides(true);
      return;
    }
    if (diff > -8 && diff < 8) {
      changeSlides();
      return;
    }
    if (diff <= -8) {
      navigateLeft();
    }
    if (diff >= 8) {
      navigateRight();
    }
  });
  
  $(document).on("click", ".slider-control", function() {
    if ($(this).hasClass("left")) {
      navigateLeft();
    } else {
      navigateRight();
    }
  });
  
  $(document).on("click", ".slider-pagi__elem", function() {
    curSlide = $(this).data("page");
    changeSlides();
  });
  
});
</script>
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  </body>

</html>
