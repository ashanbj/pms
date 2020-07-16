<?php

namespace App\Http\Controllers\Chemist;

use App\Order;
//use Session;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashController extends Controller
{
    public function view() {
        $user=Session::get('user_id');
        //dd($user);
        $orders=Order::where('chemist_id', $user)
            ->whereNotIn('order_no', [1])
            ->groupBy('order_no')
            ->get();
            //dd($orders);
        return view('Chemist/chemist-dashboard')->with('orders',$orders);
    }
}
