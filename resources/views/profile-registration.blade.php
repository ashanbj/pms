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

    <title>Profile Registration</title>

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

    @if(session()->has('emessage'))
        <div class="alert-section">
            <div class="container">
                <div class="row">
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pl-3">
                        <h4>Create Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-area">
                            <form action="/create-profile" method="POST">
                            @csrf
                                <div class="row from-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="clients_name">Parmacy Name :</label>
                                            <input type="text" class="form-control" name="clients_name" id="clients_name" placeholder="Enter your name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="clients_add">Pharmacy Address :</label>
                                            <textarea class="form-control" name="clients_add" id="clients_add" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row from-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pro_name">Province :</label>
                                                    <select name="pro_name" id="pro_name" class="form-control" required>
                                                        <option value="" disabled selected >Select Province</option>
                                                    @isset($province)
                                                        @foreach ($province as $item)
                                                            <option value="{{$item->pro_name}}">{{$item->pro_name}}</option>
                                                        @endforeach
                                                    @endisset
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dist_name">District :</label>
                                                    <select name="dist_name" id="dist_name" class="form-control" required>
                                                        <option value="" disabled selected >Select District</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city_name">City :</label>
                                                    <select name="city_name" id="city_name" class="form-control" required>
                                                        <option value="" disabled selected >Select City</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row from-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lat">Latitude of Your Location :</label>
                                                    <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="long">Longitude of Your Location :</label>
                                                    <input type="text" class="form-control" name="long" id="long" placeholder="Longitude...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row d-flex justify-content-end mr-5">
                                    <div class="form-group">
                                        @isset($user_id)
                                        <input type="hidden" name="user_id" value="{{$user_id}}">
                                        @endisset
                                        <input type="submit" class="form-control btn"  class="fadeIn fourth" value="Create">
                                    </div>
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
    <script type="text/javascript" src="{{asset('js/global.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/get-districts.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/get-cities.js')}}"></script>
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