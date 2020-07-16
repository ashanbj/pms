@extends('layouts.dashboard')

@section('title')
    Add email List
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
                <li class="nav-item dropdown active">
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
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/add-products') }}">Add Products</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('company/add-emails') }}">Email List <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/view-orders') }}">View Orders</span></a>
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
                    <h4>Add E-mails</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>E-mail Address</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($email)
                            @foreach ($email as $item)
                                <tr>
                                    <td scope="row">{{$item->email}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->designation}}</td>
                                    <td>
                                        <div class="btns-group">
                                            <button id="delete-btn" name="delete-btn" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-data" data-id='{{$item->id}}'>
                                                Delete
                                            </button>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach 
                            @endisset
                        </tbody>
                    </table>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Email Line
                    </button>
  
                    <!-- Modal for create products -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="/create-email" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add E-mail Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row from-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email">Email Address :</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email addres...">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Name :</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name...">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="designation">Product Category :</label>
                                                    <select name="designation" id="designation" class="form-control">
                                                        <option value="" selected>Select a Designation</option>
                                                        <option value="Company Manager">Company Manager</option>
                                                        <option value="Department Manager">Department Manager</option>
                                                        <option value="Marketing Manager">Marketing Manager</option>
                                                        <option value="Sales Manager">Sales Manager</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning"  class="fadeIn fourth">Create</button>
                                    </div>
                                </div>
                                                    
                            </form>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="/delete-email" method="POST">
                            @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Product</h5>
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
            
            $("#did").val(getid);
        });
    </script>
@endsection