@extends('layouts.dashboard')

@section('style-css')
    <link rel="stylesheet" href="{{asset('css/chemist/place-order-style.css')}}">
@endsection

@section('title')
    Dashboard
@endsection

@section('navbar')

<nav class="navbar navbar-expand-lg fixed-top navbar-transparent" style="background:#343a40 !important ;">
    <div class="container">


        <div class="navbar-translate">
            <a class="navbar-brand" href="#">
                PMS
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar top-bar"></span>
                <span class="navbar-toggler-bar middle-bar"></span>
                <span class="navbar-toggler-bar bottom-bar"></span>
            </button>
        </div>

        <div class="navbar-collapse justify-content-end has-image collapse show" id="navigation" style="background:#343a40;">
            <ul class="navbar-nav">


                <li class="nav-item">
                    <a class="nav-link" href="{{ url('chemist/dashboard') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink4" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="now-ui-icons design_app"></i>
                        <p>Orders</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink4">
                        <a class="dropdown-item" href="{{ url('chemist/place-order') }}">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                            Place Order
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            View Orders
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom"
                    href="{{ url('logout') }}" 
                        data-original-title="Log Out">
                        <i class="material-icons sign-out-icon">settings_power</i>
                        <p class="d-lg-none d-xl-none">Log Out</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

{{-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand pl-3" href="#">PMS</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('chemist/dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('chemist/place-order') }}">Place Order <span class="sr-only">(current)</span></a>
        </li>
    </ul>
    <ul class="my-2 my-lg-0">

    </ul>
    <form class="my-2 my-lg-0">
        <a class="nav-link text-uppercase" href="{{ url('logout') }}">Logout</a>
    </form>
    </div>
</nav> --}}
@endsection

@section('content')

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

    @if(session()->has('emessage'))
        <div class="alert-section">
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
    @endif

    @if(session()->has('dmessage'))
        <div class="alert-section">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ session()->get('dmessage') }}</strong>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert-section">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    @endif

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>Place Order</h4>
                </div>
                <div class="card-body">
                    <form action="/place-order-action" method="POST" id="order-form">
                        @csrf
                        <div class="row form-row">
                            <div class="col-4">
                                <div class="form-group for-readonly">
                                    <label for="order_no">Order Number</label>
                                    @isset($order_no)
                                        <input type="hidden" name="order_no" id="order_no" value="{{$order_no}}">
                                        <input type="text" class="form-control" value="PO No:PMS00{{$order_no}}" disabled>
                                    @endisset
                                </div>
                            </div>
                        </div>

                        <table class="table table-responsive-xl" id="product-table">
                            <thead>
                                <tr>
                                    {{-- <th>Product Category</th> --}}
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-data-row">
                                    {{-- <td scope="row">
                                        <div class="form-group">
                                            <select name="category_id[]" id="category_name" class="form-control category_name" required>
                                                <option value="" disabled selected>Select a Category</option>
                                                @isset($product)
                                                    @foreach ($product as $pro)
                                                        <option value="{{$pro->id}}">{{$pro->category_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </td> --}}
                                    <td scope="row">
                                        <div class="form-group">
                                            <select name="product_id[]" id="product_name" class="form-control product_name" required>
                                                <option value="" disabled selected>Select a Product</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="form-group for-readonly">
                                            <input type="number" name="product_price[]" id="product_price" class="form-control product_price" min="0" value="0.00" readonly required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control product_quantity" name="product_quantity[]" id="product_quantity" placeholder="Enter quantity..." min="1" pattern="[0-9]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group for-readonly">
                                            <input type="number" class="form-control product_amount" name="product_amount[]" id="product_amount" min="0" value="0.00" readonly required>
                                        </div>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-12">
                            <button type="button" class="btn btn-new-line float-left" id="btn-new-line">
                                <i class="fas fa-plus-square"></i>
                            </button>
                            <div class="form-group float-right">
                                <div class="form-group for-readonly">
                                    <label for="total_amount">Total Amount</label>
                                    <input type="number" class="form-control" name="total_amount" id="total_amount" min="0" value="0.00" readonly required>
                                </div>
                                <button type="submit" class="btn btn-primary ml-5">
                                    Submit
                                </button>
                            </div>
                            
                        </div>

                    </form>
                </div>
            </div>  
        </div>
    </div>
    
@endsection


@section('scripts')

    <script type="text/javascript" src="{{asset('js/place-order.js')}}"></script>

@endsection