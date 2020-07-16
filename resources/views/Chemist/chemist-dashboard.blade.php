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
            <a class="nav-link" href="{{ url('chemist/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('chemist/place-order') }}">Place Order</a>
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
                                <th>PO Number</th>
                                <th>Ordered Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($orders)
                            @foreach ($orders as $item)
                                <tr>
                                    <td scope="row">PO No:PMS00{{$item->order_no}}</td>
                                    <td>{{$item->updated_at->format('j F, Y')}}</td>
                                    <td>{{number_format((float)$item->total_amount, 2, '.', '')}}</td>
                                    @if ($item->status=='active')
                                    <td>Pending</td>
                                    @else
                                    <td>Received</td>
                                    @endif
                                    <td>
                                        <div class="btns-group justify-content-center">
                                        <a id="delete-btn" name="delete-btn" type="button" class="btn" href="/export_excel/{{$item->order_no}}">
                                                View
                                            </a>
                                        </div>
                                    </td>
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