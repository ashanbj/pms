<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use App\Order;
//use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;


class ExportExcelController extends Controller {

    public function view($id) {
        
        if(Session::get('role')=='company') {

            $json_order_list = DB::table('orders')
                ->join('company_products', 'company_products.id', '=', 'orders.product_id')
                ->join('clients', 'clients.clients_id', '=', 'orders.chemist_id')
                ->whereNotIn('orders.order_no', [1])
                ->where('orders.order_no', '=', $id)
                ->where('company_products.company_id', '=', Session::get('user_id'))
                ->select('orders.order_no','orders.total_amount','clients.clients_name','clients.clients_add','orders.updated_at','company_products.product_name','company_products.product_category','orders.product_price','orders.product_quantity','orders.product_amount')
                //->distinct()
                ->get();
                //dd($json_order_list);


            $order_list = json_decode($json_order_list, true);

            //$date=date_create($order_list[0]['created_at'])->format('j F, Y');
            //dd($date);

            $company_total=0;
            foreach ($json_order_list as $order) {
                $company_total+=$order->product_amount;
            }

            //dd($company_total);
            return view('Chemist/export_excel')
            ->with('company_total', $company_total)
            ->with('order_list',$order_list);

        }
        else {

            $json_order_list = DB::table('orders')
                ->join('company_products', 'company_products.id', '=', 'orders.product_id')
                ->join('clients', 'clients.clients_id', '=', 'orders.chemist_id')
                ->whereNotIn('orders.order_no', [1])
                ->where('orders.order_no', '=', $id)
                ->select('orders.order_no','orders.total_amount','clients.clients_name','clients.clients_add','orders.updated_at','company_products.product_name','company_products.product_category','orders.product_price','orders.product_quantity','orders.product_amount')
                //->distinct()
                ->get();
                //dd($json_order_list);
            $order_list = json_decode($json_order_list, true);

            //dd($order_list);
            return view('Chemist/export_excel')->with('order_list',$order_list);
        }

    }

    public function excel($id) {
        //return (new OrderExport)->forId($id)->download('order-list.xlsx'); //use other excel to use this
        return Excel::download((new OrderExport)->forId($id), 'order-list.xlsx');
     
    }
    
}
