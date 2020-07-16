@extends('layouts.dashboard')

@section('title')
    Add District
@endsection

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('admin/add-district') }}">Add District <span class="sr-only">(current)</a>
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
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/view-orders') }}">View Orders</a>
        </li>
    </ul>
    <ul class="my-2 my-lg-0">

    </ul>
    <form class="my-2 my-lg-0">
        <a class="nav-link text-uppercase" href="{{ url('logout') }}">Logout</a>
    </form>
    </div>
</nav>
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

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>Add District</h4>
                </div>
                <div class="card-body">
                    <div class="form-area">
                        <form action="/create-district" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="dist_no">District No :</label>
                                <input type="number" class="form-control" name="dist_no" id="dist_no" placeholder="@isset($last_dist_no) last district no : {{$last_dist_no}} @endisset" min="@isset($last_dist_no){{$last_dist_no+1}}@endisset" required>
                              </div>
                            <div class="form-group">
                                <label for="dist_name">District Name :</label>
                                <input type="text" class="form-control" name="dist_name" id="dist_name" placeholder="Enter district name..." required>
                            </div>
                            <div class="form-group">
                                <label for="pro_name">Province :</label>
                                <select name="pro_name" id="pro_name" class="form-control" required>
                                @isset($province)
                                    @foreach ($province as $item)
                                        <option value="{{$item->pro_name}}">{{$item->pro_name}}</option>
                                    @endforeach
                                @endisset
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn"  class="fadeIn fourth" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>    
@endsection