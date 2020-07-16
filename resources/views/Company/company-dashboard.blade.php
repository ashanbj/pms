@extends('layouts.dashboard')

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


                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('company/dashboard') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink4" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="now-ui-icons design_app"></i>
                        <p>Products</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink4">
                        <a class="dropdown-item" href="{{ url('company/add-products') }}">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                            Add Products
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            Edit Products
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink5" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="now-ui-icons design_app"></i>
                        <p>Email List</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink5">
                        <a class="dropdown-item" href="{{ url('company/add-emails') }}">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                            Add Email
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            View Email
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('company/view-orders') }}">
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
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('company/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/add-products') }}">Add Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/add-emails') }}">Email List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/view-orders') }}">View Orders</a>
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

    @if(session()->has('emessage'))
        <div class="alert-section">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="alert alert-success" role="alert">
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
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View All Products</h4>
                </div>
                <div class="card-body">
                    <table class="mdl-data-table table-responsive-xl" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">Product Name</th>
                                <th>Price</th>
                                <th>Product Category</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($product)
                            @foreach ($product as $item)
                                <tr>
                                    <td scope="row" class="text-center">{{$item->product_name}}</td>
                                    <td>{{$item->product_price}}</td>
                                    <td>{{$item->product_category}}</td>
                                    <td>
                                        <div class="btns-group justify-content-center">
                                            <button id="delete-btn" name="delete-btn" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-data" data-id='{{$item->id}}'>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
                            @endisset

                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="/delete-pharma-product" method="POST">
                                    @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Product Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are You Sure ?</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>
                                                <input type="hidden" id="id" name="id">
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

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View Email List</h4>
                </div>
                <div class="card-body">
                    <table class="mdl-data-table table-responsive-xl" id="datatable2">
                        <thead>
                            <tr>
                                <th class="text-center">Email Address</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($email)
                            @foreach ($email as $item2)
                                <tr>
                                    <td class="d-flex justify-content-start">{{$item2->email}}</td>
                                    <td>{{$item2->name}}</td>
                                    <td>{{$item2->designation}}</td>
                                    <td class="d-flex justify-content-end">
                                        <div class="btns-group justify-content-center">
                                            <button id="delete-btn2" name="delete-btn2" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-data2" data-did='{{$item2->id}}'>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
                            @endisset

                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete-data2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="/delete-email" method="POST">
                                    @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Email Data</h5>
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
    <!-- send data to delete modal -->
    <script>
        $(document).on("click", "#delete-btn", function () {
            var getid = $(this).data('id');
            
            $("#id").val(getid);
        });

        $(document).on("click", "#delete-btn2", function () {
            var getid = $(this).data('did');
            
            $("#did").val(getid);
        });
    </script>
@endsection