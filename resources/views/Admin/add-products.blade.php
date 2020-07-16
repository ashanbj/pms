@extends('layouts.dashboard')

@section('title')
    Add Products
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
                <li class="nav-item dropdown active">
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
                <li class="nav-item">
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
            <a class="nav-link" href="{{ url('admin/add-province') }}">Add Province <span class="sr-only">(current)</a>
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
        <li class="nav-item active">
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

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>Create Product Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-area">
                        <form action="/create-product" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="category_no">Category No :</label>
                                <input type="number" class="form-control" name="category_no" id="category_no" placeholder="@isset($last_category_no) last category no : {{$last_category_no}} @endisset" min="@isset($last_category_no){{$last_category_no+1}}@endisset">
                              </div>
                            <div class="form-group">
                                <label for="category_name">Category Name :</label>
                                <input type="text"
                                  class="form-control" name="category_name" id="category_name" placeholder="Enter category name...">
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
    
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View All Product Categories</h4>
                </div>
                <div class="card-body">
                    <table class="mdl-data-table table-responsive-xl" id="datatable">
                        <thead>
                            <tr>
                                <th>Category No</th>
                                <th>Category Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($product)
                            @foreach ($product as $item)
                                <tr>
                                    <td scope="row">{{$item->category_no}}</td>
                                    <td>{{$item->category_name}}</td>
                                    <td>
                                        <div class="btns-group justify-content-center">
                                            <button id="edit-btn" name="edit-btn" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-data" data-id='{{$item->id}}' data-name='{{$item->category_name}}' data-no='{{$item->category_no}}'>
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
                                    <form action="/edit-product-category" method="POST">
                                    @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Procuct Category Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-area">
                                                    <div class="form-group">
                                                        <label for="category_no">Category No :</label>
                                                        <input type="number" class="form-control" name="category_no" id="category_no1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category_name">Category Name :</label>
                                                        <input type="text" class="form-control" name="category_name" id="category_name1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>
                                                <input type="hidden" id="id2" name="id">
                                                <button type="submit" class="btn btn-success ml-4">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="/delete-product-categoey" method="POST">
                                    @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Product Category Data</h5>
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
    
@endsection

@section('scripts')
    <!-- send data to edit modal-->
    <script>
        $(document).on("click", "#edit-btn", function () {
            var getid = $(this).data('id');
            var getNo = $(this).data('no');
            var getName= $(this).data('name');
            
            $("#id2").val(getid);
            $("#category_no1").val(getNo);
            $("#category_name1").val(getName);
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