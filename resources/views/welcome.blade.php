<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">

    <!--fonts and icons-->        
    <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/unicode-fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/english-fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">

    <!--css files-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/now-ui-kit.css')}}">
    <link rel="stylesheet" href="{{asset('css/now-ui-kit.css')}}">
    <link rel="stylesheet" href="{{asset('css/loader-style.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/index-style.css')}}">

    <title>Login here</title>

</head>

<body class="index-page sidebar-collapse">
   
    <!-- loader erea -->
    <div class="loader">
        <img src="{{asset('img/loader.gif')}}">
    </div>
    <!-- end of loader erea -->

    @if(session()->has('message'))
        <div class="alert-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    @endif

    @if(session()->has('nopmessage'))
        <div class="alert-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session()->get('nopmessage') }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    @endif

    <div class="wrapper fadeInDown">
        <div id="formContent" class="pt-5">
            <!-- Tabs Titles -->
            <div class="tab-title">
                <h1>WELCOME</h1>
            </div>
        
            <!-- Login Form -->
            <form action="/authentication" method="POST"  class="login-form validate-form">
            @csrf
                <input type="text" id="login" class="fadeIn second" name="user_id" placeholder="Enter user id">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
        
            <!-- Remind Passowrd -->
            <!--<div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>-->
            <div id="formFooter">
                <a class="underlineHover" href="/start">Register Here !</a>
            </div>
        
        </div>
    </div> 
    
    <!--core js files-->
    <script type="text/javascript" src="{{asset('js/core/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/core/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/now-ui-kit.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/loader.js')}}"></script>
    <!--end ofcore js files-->
    
    <!-- Alert Dismiss scripts -->
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideToggle(500, function(){
            $(this).remove();
        });
    }, 3500);
    </script>
    <!-- end of Alert Dismiss scripts -->
    
</body>

</html>