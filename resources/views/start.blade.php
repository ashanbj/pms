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
    <link rel="stylesheet" href="{{asset('css/loader-style.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/index-chemist-login.css')}}">

    <title>Chemist Portal</title>

</head>

<body class="index-page sidebar-collapse">
   
    <!-- loader erea -->
    <div class="loader">
        <img src="{{asset('img/loader.gif')}}">
    </div>
    <!-- end of loader erea -->
    
    @foreach ($errors->all() as $error)
        <div class="alert-section">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    @endforeach

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

    <div class="wrapper">
        <div class="header">
            <div class="container mt-5 pt-1">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <form action="registration" method="POST">
                        @csrf
                            <h4 class="text-center mb-5">Chemist Registration Portal</h4>
                            <h1 class="text-center mt-1">Let,s get started</h1>
                            <h3>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input class="form-control num1" type="text" name="num1" id="num1" value="+94" readonly>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <input class="form-control num2" type="number" name="number" id="number" min="0" placeholder="Enter your number">
                                        </div>
                                    </div>
                                </div>
                            </h3>
                            <h3 class="text-center">By signing up you accept our terms of service and privacy policy</h3>
                            <div class="btns-group d-flex justify-content-center mb-2">
                                <button type="submit" class="btn btn-custom">Continue</button>
                            </div>
                            <p class="text-center mt-5">Already have an account ? 
                                <a name="log" id="log" href="/" role="button">Log In Here !</a>
                            </p>
                        </form>
                    </div>
                </div>
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