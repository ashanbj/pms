@extends('layouts.dashboard')

@section('style-css')
    <link rel="stylesheet" href="{{asset('css/admin/view-orders-style.css')}}">
@endsection

@section('title')
    View Orders
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
                    <a class="nav-link" href="{{ url('admin/dashboard') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="now-ui-icons design_app"></i>
                        <p>Province</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                        <a class="dropdown-item" href="{{ url('admin/add-province') }}">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                            Add Province
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            Edit Province
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="now-ui-icons design_app"></i>
                        <p>Districts</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <a class="dropdown-item" href="{{ url('admin/add-district') }}">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                            Add Districts
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            Edit Districts
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink3" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="now-ui-icons design_app"></i>
                        <p>Cities</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink3">
                        <a class="dropdown-item" href="{{ url('admin/add-cities') }}">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                            Add Cities
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            Edit Cities
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/add-companies') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Add Companies</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink4" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="now-ui-icons design_app"></i>
                        <p>Product Categories</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink4">
                        <a class="dropdown-item" href="{{ url('admin/add-products') }}">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                            Add Categories
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            Edit Categories
                        </a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('admin/view-orders') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>View Orders</p>
                    </a>
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
            <a class="nav-link" href="{{ url('admin/dashboard') }}">Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/add-province') }}">Add Province</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/add-district') }}">Add District</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/add-cities') }}">Add Cities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/add-companies') }}">Add Companies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/add-products') }}">Add Product Category</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('admin/view-orders') }}">View Orders<span class="sr-only">(current)</a>
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

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View All Orders</h4>
                </div>
                <div class="card-body">
                    <table class="mdl-data-table table-responsive-xl" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">PO Number</th>
                                <th>Ordered Date</th>
                                <th>Total Amount</th>
                                <th>View</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($orders)
                            @foreach ($orders as $item)
                                <tr>
                                    <td scope="row" class="text-center">PO No:PMS00{{$item->order_no}}</td>
                                    <td>{{$item->updated_at->format('j F, Y')}}</td>
                                    <td>{{number_format((float)$item->total_amount, 2, '.', '')}}</td>
                                    <td class="text-center">
                                        <div class="btns-group justify-content-center">
                                        <a id="delete-btn" name="delete-btn" type="button" class="btn" href="/export_excel/{{$item->order_no}}">
                                                View
                                            </a>
                                        </div>
                                    </td>
                                    @if ($item->status=='active')
                                    <td>
                                        <div class="btns-group justify-content-center">
                                            <a id="delete-btn" name="delete-btn" type="button" class="btn btnnn btn-mark" href="/mark_order_as_delivered/{{$item->order_no}}">
                                                Mark As Delivered
                                            </a>
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        <div class="btns-group delivered-area justify-content-center">
                                            <a id="delete-btn" name="delete-btn" type="button" class="btn btnnn btn-delivered">
                                                Delivered
                                            </a>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach 
                            @endisset                            
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>   
@endsection