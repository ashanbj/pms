@extends('layouts.dashboard')

@section('title')
    Add Companies
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
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/add-district') }}">Add District</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/add-cities') }}">Add Cities</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('admin/add-companies') }}">Add Companies <span class="sr-only">(current)</a>
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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>Add Pharma Company</h4>
                </div>
                <div class="card-body">
                    <div class="form-area">
                        <form action="/create-company" method="POST">
                        @csrf
                            <div class="row from-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sup_name">Supplier Name :</label>
                                        <input type="text" class="form-control" name="sup_name" id="sup_name" placeholder="Enter supplier name..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sup_add">Supplier Address :</label>
                                        <input type="text" class="form-control" name="sup_add" id="sup_add" placeholder="Enter address..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_per">Contact Person :</label>
                                        <input type="text" class="form-control" name="contact_per" id="contact_per" placeholder="Enter contact person..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_no">Contact No :</label>
                                        <input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Enter contact number..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email :</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email..." required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tell_no">Telephone Name :</label>
                                        <input type="number" class="form-control" name="tell_no" id="tell_no" placeholder="Enter telephone number..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation :</label>
                                        <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter designation..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">User ID:</label>
                                        <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Enter user id..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password :</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row d-flex justify-content-end mr-5">
                                <div class="form-group">
                                    <input type="submit" class="form-control btn"  class="fadeIn fourth" value="Create">
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>    
@endsection