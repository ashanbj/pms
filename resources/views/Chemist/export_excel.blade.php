@extends('layouts.dashboard')

@section('style-css')
    <link rel="stylesheet" href="{{asset('css/chemist/place-order-style.css')}}">
@endsection

@section('title')
    Orderd List
@endsection

@section('content')

    <div class="row" style="margin-top: -4rem;">
        <div class="col-12">
            <div class="card">
                <div class="card-header pl-3">
                    <h4>View Order Details</h4>
                    @if (Session::get('role')=='user')
                        <a href="/chemist/dashboard" class="float-right mr-4" style="margin-top: -40px; text-decoration:none;">close</a>
                    @elseif(Session::get('role')=='company')
                        <a href="/company/view-orders" class="float-right mr-4" style="margin-top: -40px; text-decoration:none;">close</a>
                    @else
                        <a href="/admin/view-orders" class="float-right mr-4" style="margin-top: -40px; text-decoration:none;">close</a>
                    @endif
                </div>
                <div class="card-body">
                    
                    <div class="row form-row mb-3">
                        <div class="col-4">
                            <div class="form-group for-readonly">
                                <label for="order_no">Order Details</label>
                                @if ($order_list[0]['order_no'] <=9)
                                    <input type="text" class="form-control mb-1" value="PO : PMS000{{$order_list[0]['order_no']}}" disabled>
                                @elseif ($order_list[0]['order_no'] <=99)
                                    <input type="text" class="form-control mb-1" value="PO : PMS00{{$order_list[0]['order_no']}}" disabled>
                                @else
                                    <input type="text" class="form-control mb-1" value="PO : PMS0{{$order_list[0]['order_no']}}" disabled>
                                @endif
                                    {{-- <input type="text" class="form-control mb-1" value="PO : PMS00{{$order_list[0]['order_no']}}" disabled> --}}
                                    <input type="text" class="form-control mb-1" value="Client Name : {{$order_list[0]['clients_name']}}" disabled>
                                    <input type="text" class="form-control mb-1" value="Client Address : {{$order_list[0]['clients_add']}}" disabled>
                                    <input type="text" class="form-control" value="Orderd Date : {{date_create($order_list[0]['updated_at'])->format('j F, Y')}}" disabled>
                            </div>
                        </div>
                    </div>

                    <table class="mdl-data-table table table-responsive-xl" id="datatabl">
                        <thead>
                            <tr style="text-align: left;">
                                <th style="text-align: left;">Product Name</th>
                                <th style="text-align: left;">Product Category</th>
                                <th>Price</th>
                                <th style="text-align: right;">Quantity</th>
                                <th style="text-align: right;">Product Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($order_list)
                            @foreach ($order_list as $item)
                                <tr style="text-align: left;">
                                    <td style="text-align: left;">{{$item['product_name']}}</td>
                                    <td style="text-align: left;">{{$item['product_category']}}</td>
                                    <td>{{number_format((float)$item['product_price'], 2, '.', '')}}</td>
                                    <td style="text-align: right;">{{$item['product_quantity']}}</td>
                                    <td style="text-align: right;">{{number_format((float)$item['product_amount'], 2, '.', '')}}</td>
                                </tr>
                            @endforeach 
                            @endisset
                        </tbody>
                    </table>

                    <div class="col-12">
                        <div class="form-group float-right">
                            <div class="form-group for-readonly" style="text-align: right;">
                                <label class="mr-2" for="total_amount">Total Amount</label>
                                @if (Session::get('role')=='user')
                                    <input type="number" style="text-align: right;" class="form-control" value="{{number_format((float)$order_list[0]['total_amount'], 2, '.', '')}}" disabled>
                                @elseif(Session::get('role')=='company')
                                    <input type="number" style="text-align: right;" class="form-control" value="{{number_format((float)$company_total, 2, '.', '')}}" disabled>
                                @else
                                <input type="number" style="text-align: right;" class="form-control" value="{{number_format((float)$order_list[0]['total_amount'], 2, '.', '')}}" disabled>
                                @endif
                            </div>
                        <a href="/export_excel/download/{{$order_list[0]['order_no']}}" type="submit" style="background: #333" class="btn btn-light ml-5">
                                Download Excel Sheet
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>  
        </div>
    </div>

    
@endsection


@section('scripts')
@endsection