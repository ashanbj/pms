<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class orderController extends Controller
{
    public function view() {
        $user=Session::get('user_id');
        //dd($user);
        $json_order_list=Order::
            join('company_products', 'company_products.id', '=', 'orders.product_id')
            //->where('orders.status', 'active')
            ->where('company_products.company_id', $user)
            ->whereNotIn('order_no', [1])
            ->groupBy('order_no')
            ->select('orders.order_no','company_products.product_category', 'company_products.product_name', 'orders.product_price', 'orders.product_quantity', 'orders.product_amount','orders.updated_at', 'orders.status')
            ->get();
            //dd($order_list);
            
        //-------------------------------------   

        //$order_list = json_decode($json_order_list, true);
        $count=0;

        foreach ($json_order_list as $order) {

            $company=Order::
            join('company_products', 'company_products.id', '=', 'orders.product_id')
            //->where('orders.status', 'active')
            ->where('company_products.company_id', $user)
            ->where('orders.order_no', $order->order_no)
            ->whereNotIn('order_no', [1])
            ->select('orders.order_no','company_products.product_name', 'orders.product_price', 'orders.product_quantity', 'orders.product_amount')
            ->get();
            //dd($company);
            $total_amount=0;
            foreach ($company as $amount) {
                $total_amount+=$amount->product_amount;
            }
            
            $json_order_list[$count]["company_total"]=$total_amount;
            
            $count++;
        }
        //--------------------------------------
           
        return view('Company/view-orders')
        //->with('orders',$json_order_list)
        ->with('company_amount',$json_order_list);
    }
}
