<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template"> -->

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('assets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" media="all">
    <style>
    .leffto{
        margin-left: 15%;
    }
    @media only screen and (max-width: 600px) {
      .leffto{
        margin-left: 0%;
    }
    }
    @media only screen and (min-width: 610px) and (max-width: 768px){
     .leffto{
        margin-left: 0%;
    } 
    }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <!-- <div class="login-wrap"> -->
                <div class="col-lg-8 leffto">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset('assets/images/icon/logo.png') }}" alt="AgileAX">
                            </a>
                        </div>
                         @if(Session::has('alert'))
                            <div class="alert alert-success">
                                {{ Session::get('alert') }}
                                @php
                                Session::forget('alert');
                                @endphp
                            </div>
                            @endif
                        <div class="login-form">
                            <form method="post" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input id="name" type="text" class="au-input au-input--full" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif                                
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input id="email" type="email" class="au-input au-input--full" placeholder="Email" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif 
                                        </div>                                   
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="password" type="password" class="au-input au-input--full" placeholder="Password" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input id="company" type="text" class="au-input au-input--full" name="company" placeholder="Company" value="{{ old('company') }}" required autofocus>

                                            @if ($errors->has('company'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('company') }}</strong>
                                                </span>
                                            @endif                                
                                        </div>
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <select class="custom-select au-input au-input--full" id="user_type" name="user_type">
                                              <option value="Investment Advisor">Investment Advisor</option>
                                              <option value="Private Funds">Private Funds</option>
                                              <option value="Broker Dealer">Broker Dealer</option>
                                              <option value="Private Equity">Private Equity</option>
                                              <option value="Consultant">Consultant</option>
                                            </select>
                                        </div>
                                    </div>
                                   <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input id="lastname" type="text" class="au-input au-input--full" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required autofocus>

                                            @if ($errors->has('lastname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif                                                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input id="dateofbirth" type="date" class="au-input au-input--full" name="dateofbirth" value="{{ old('dateofbirth') }}" required autofocus>

                                            @if ($errors->has('dateofbirth'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('dateofbirth') }}</strong>
                                                </span>
                                            @endif                               
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <!-- <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required> -->
                                            <input id="password-confirm" type="password" class="au-input au-input--full" placeholder="Confirm Password" name="password_confirmation" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Organization</label>
                                            <input id="organization" type="text" class="au-input au-input--full" name="organization" placeholder="Organization" value="{{ old('organization') }}" required autofocus>

                                            @if ($errors->has('organization'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('organization') }}</strong>
                                                </span>
                                            @endif                                
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input id="phonenumber" type="text" class="au-input au-input--full" name="phonenumber" placeholder="Phone Number" value="{{ old('phonenumber') }}" required autofocus>

                                            @if ($errors->has('phonenumber'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phonenumber') }}</strong>
                                                </span>
                                            @endif                                
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div> -->
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div> -->
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{ route('login') }}">Sign In</a>
                                </p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('assets/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->



