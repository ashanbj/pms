@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand pl-3" href="#">PMS</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
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

    @if(session()->has('emessage'))
        <div class="alert-section">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="alert alert-warning" role="alert">
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

    <div class="row d-flex justify-content-center mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View All clients</h4>
                    <div class="search-panel" id="search-panel">
                        <form action="/search-clients" method="POST">
                            @csrf 
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pro_name">Province :</label>
                                                <select name="pro_name" id="pro_name" class="form-control">
                                                    <option value="" disabled selected>Select a Province</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city_name">City :</label>
                                                <select name="city_name" id="city_name" class="form-control">
                                                    <option value="" disabled selected>Select a District First</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dist_name">District :</label>
                                                <select name="dist_name" id="dist_name" class="form-control">
                                                    <option value="" disabled selected>Select a Province First</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="client_area">
                                                <label for="clients_name">Name :</label>
                                                <select name="clients_name" id="clients_name"  class="form-control">
                                                    <option value="" disabled selected>Select a City First</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-5">
                                    <div class="form-row row d-flex justify-content-end mr-5">
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn"  class="fadeIn fourth" value="Search">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Province</th>
                                <th>Photograph</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($client)
                            @foreach ($client as $cl)
                                <tr>
                                    <td scope="row">{{$cl->clients_name}}</td>
                                    <td>{{$cl->clients_add}}</td>
                                    <td>{{$cl->city_name}}</td>
                                    <td>{{$cl->dist_name}}</td>
                                    <td>{{$cl->pro_name}}</td>
                                </tr>
                            @endforeach 
                            @endisset
                           
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View All Cities</h4>
                </div>
                <div class="card-body">
                    <table class="mdl-data-table table-responsive-xl" id="datatable">
                        <thead>
                            <tr>
                                <th>City No</th>
                                <th>City Name</th>
                                <th>District</th>
                                <th>Province</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($city)
                            @foreach ($city as $item)
                                <tr>
                                    <td scope="row">{{$item->city_no}}</td>
                                    <td>{{$item->city_name}}</td>
                                    <td>{{$item->dist_name}}</td>
                                    <td>{{$item->pro_name}}</td>
                                    <td>
                                        <div class="btns-group justify-content-center">
                                            <button id="edit-btn" name="edit-btn" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-data" data-id='{{$item->id}}' data-name='{{$item->city_name}}' data-no='{{$item->city_no}}' data-dist='{{$item->dist_name}}' data-pro='{{$item->pro_name}}'>
                                                Edit
                                            </button>
                                            <button id="delete-btn" name="delete-btn" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-data" data-did='{{$item->id}}'>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
                            @endisset

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="/edit-city" method="POST">
                                    @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit City Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-area">
                                                    <div class="form-group">
                                                        <label for="city_no">City No :</label>
                                                        <input type="text" class="form-control" name="city_no" id="city_no" placeholder="Enter city no..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="city_name">City Name :</label>
                                                        <input type="text" class="form-control" name="city_name" id="city_name" placeholder="Enter city name..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dist_name">District :</label>
                                                        <input type="text" class="form-control" name="dist_name" id="dist_name" placeholder="Enter city name..." readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pro_name">Province :</label>
                                                        <input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="Enter city name..." readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>
                                                <input type="hidden" id="id" name="id">
                                                <button type="submit" class="btn btn-success ml-4">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="/delete-city" method="POST">
                                    @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete City Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are You Sure ?</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>
                                                <input type="hidden" id="did" name="did">
                                                <button type="submit" class="btn btn-danger ml-4">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
    
    <div class="row d-flex justify-content-center mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View All Companies</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Supplier Address</th>
                                <th>Contact Person</th>
                                <th>Contact No</th>
                                <th>Tell No</th>
                                <th>Designation</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($company)
                            @foreach ($company as $com)
                                <tr>
                                    <td scope="row">{{$com->sup_name}}</td>
                                    <td>{{$com->sup_add}}</td>
                                    <td>{{$com->contact_per}}</td>
                                    <td>{{$com->contact_no}}</td>
                                    <td>{{$com->tell_no}}</td>
                                    <td>{{$com->designation}}</td>
                                    <td>{{$com->email}}</td>
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


@section('scripts')

<script type="text/javascript" src="{{asset('js/global.js')}}"></script>
<script type="text/javascript" src="{{asset('js/get-location-data.js')}}"></script>

    <!-- send data to edit modal-->
    <script>
        $(document).on("click", "#edit-btn", function () {
            var getid = $(this).data('id');
            var getCityNo = $(this).data('no');
            var getCityName= $(this).data('name');
            var getProName= $(this).data('dist');
            var getDistName= $(this).data('pro');
            
            $("#id").val(getid);
            $("#city_no").val(getCityNo);
            $("#city_name").val(getCityName);
            $("#dist_name").val(getDistName);
            $("#pro_name").val(getProName);
        });
    </script>

    <!-- send data to delete modal -->
    <script>
        $(document).on("click", "#delete-btn", function () {
            var getid = $(this).data('did');
            
            $("#did").val(getid);
        });
    </script>
@endsection