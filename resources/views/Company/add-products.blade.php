@extends('layouts.dashboard')

@section('style-css')
    <link rel="stylesheet" href="{{asset('css/chemist/place-order-style.css')}}">
@endsection

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
                    <a class="nav-link" href="{{ url('company/dashboard') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item dropdown active">
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
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('company/add-products') }}">Add Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('company/add-emails') }}">Email List</a>
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
                    <h4>Create Products</h4>
                </div>
                <div class="card-body">
                    <form action="/create-pharma-product" method="POST">
                        @csrf
                        <table class="table table-responsive-xl" id="product-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Product Category</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="product_name[]" id="product_name" placeholder="Enter product name..." required>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="product_price[]" id="product_price" min="0" value="0.00" step=".01" placeholder="Enter product price..." required>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="product_category_id[]" id="product_category_id" class="form-control .product_category" required>
                                                    <option value="" selected>Select a Category</option>
                                                    @isset($mproduct)
                                                        @foreach ($mproduct as $pro)
                                                            {{-- <option value="{{$pro->id}}|{{$pro->category_name}}">{{$pro->category_name}}</option> --}}
                                                            <option value='[{"name":"{{$pro->category_name}}"},{"id":"{{$pro->id}}"}]'>{{$pro->category_name}}</option>

                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="status[]" value="active">
                                        <input type="hidden" name="company_id[]" value="{{$user}}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-12">
                            <button type="button" class="btn btn-new-line float-left" onclick="addNewRow()">
                                <i class="fas fa-plus-square"></i>
                            </button>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group float-right ml-3">
                        <!-- Form -->
                        <form method='post' id="upload-form" action='/uploadFile' enctype='multipart/form-data' >
                            {{ csrf_field() }}
                            <input type='file' id="file" name='file' accept=".csv, text/csv">
                            <button type="submit" class="btn ml-3 btn-primary" style="background: #2d2a2a">
                                Uplod CSV
                            </button>
                        </form>
                        
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
            
            $("#id").val(getid);
        });
    </script>

    <script>
        function addNewRow() {

            var jsonArray= "[{'name':'{{$pro->category_name}}'},{'id':'{{$pro->id}}'}]";

            var table = document.getElementById("product-table");
            var row = table.insertRow(-1);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            cell0.innerHTML = '<div class="col-12"> <div class="form-group"> <input type="text" class="form-control" name="product_name[]" id="product_name" placeholder="Enter product name..." required> </div> </div>';
            cell1.innerHTML = '<div class="col-12"> <div class="form-group"> <input type="number" class="form-control" name="product_price[]" id="product_price" placeholder="Enter product price..." required> </div> </div>';
            cell2.innerHTML = "<div class='col-12'> <div class='form-group'> <select name='product_category_id[]' id='product_category' class='form-control' required> <option value='' selected>Select a Category</option> @isset($mproduct) @foreach ($mproduct as $pro) <option value='[{\"name\":\"{{$pro->category_name}}\"},{\"id\":\"{{$pro->id}}\"}]'>{{$pro->category_name}}</option> @endforeach @endisset </select> </div> </div>";
            cell3.innerHTML = '<div class="btn-group"> <button type="button" class="btn btn-danger py-1 px-2" onclick="deleteThisRow(this);"> <i class="fas fa-backspace"></i> </button> <input type="hidden" name="status[]" value="active"> <input type="hidden" name="company_id[]" value="{{$user}}" </div>';
        }

        //function deleteTableRow() {
        //    document.getElementById("product-table").deleteRow(-1);
        //}
    </script>

    <script>
        function deleteThisRow(btndel) {
            if (typeof(btndel) == "object") {
                $(btndel).closest("tr").remove();
            } else {
                return false;
            }
        }


        document.getElementById("file").onchange = function() {
        document.getElementById("upload-form").submit();
}
    </script>

@endsection