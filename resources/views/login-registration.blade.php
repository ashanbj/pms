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

    <link rel="stylesheet" href="{{asset('css/login-registration-style.css')}}">

    <title>Login Registration</title>

</head>

<body class="index-page sidebar-collapse">
   
    <!-- loader erea -->
    <div class="loader">
        <img src="{{asset('img/loader.gif')}}">
    </div>
    <!-- end of loader erea -->

    @foreach ($errors->all() as $error)
        <div class="alert-section">
            <div class="row mt-2">
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
                <div class="row mt-2">
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

    @if(session()->has('emessage'))
        <div class="alert-section">
            <div class="container">
                <div class="row mt-2">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session()->get('emessage') }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header pl-3">
                        <h4>Login Registration</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-area">
                            <form action="/register-login-data" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="user_id">User Name (NIC) :</label>
                                    <input type="number" class="form-control" name="user_id" id="user_id" min="1" placeholder="Enter your id card no...">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address :</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email...">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password...">
                                </div>
                                <div class="form-group">
                                    <label for="com_password">Password :</label>
                                    <input type="password" class="form-control" name="com_password" id="com_password" placeholder="Verify password...">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn" value="Continue">
                                </div>
                            </form>
                        </div>
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