<?php

namespace App\Exports;

use App\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Session;


class OrderExport implements FromArray, ShouldAutoSize {

    public function forId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function array(): array {

        if(Session::get('role')=='company') {
        
            $list = Order::
                join('company_products', 'company_products.id', '=', 'orders.product_id')
                ->whereNotIn('orders.order_no', [1])
                ->where('orders.order_no', '=', $this->id)
                ->where('company_products.company_id', '=', Session::get('user_id'))
                ->select('company_products.product_category', 'company_products.product_name', 'orders.product_price', 'orders.product_quantity', 'orders.product_amount')
                ->get();
                //dd($list);

            //----------------------------
        
            $count=0;

            foreach ($list as $order) {

                $company=DB::table('orders')
                    ->join('company_products', 'company_products.id', '=', 'orders.product_id')
                    ->join('clients', 'clients.clients_id', '=', 'orders.chemist_id')
                    ->whereNotIn('orders.order_no', [1])
                    ->where('orders.order_no', '=', $this->id)
                    ->where('company_products.company_id', '=', Session::get('user_id'))
                    ->select('orders.order_no','orders.total_amount','clients.clients_name','clients.clients_add','orders.product_amount','orders.updated_at')
                    ->get();
                //dd($company);
                $total_amount=0;
                foreach ($company as $amount) {
                    $total_amount+=$amount->product_amount;
                    $client_name = $amount->clients_name;
                    $client_add = $amount->clients_add;
                    $order_no = $amount->order_no;
                    $order_date = date_create($amount->updated_at)->format('j F, Y');
                }
                $count++;
                //dd($order_date);

                //$list[$count]["company_total"]=$total_amount;
                
                
            }

            $new_order_no='PMS00'.$order_no.'';
            //dd($new_order_no);

            $array_list = json_decode($list, true);

            array_unshift($array_list, array('Product Category','Product Name','Product Price', 'Product Quantity', 'Product Amount'));
            array_unshift($array_list, array('','','', '', ''));
            array_unshift($array_list, array('-----------------','','', '', ''));
            array_unshift($array_list, array('Ordered Date',$order_date,'', '', ''));
            array_unshift($array_list, array('Client Address',$client_add,'', '', ''));
            array_unshift($array_list, array('Client Name',$client_name,'', '', ''));
            array_unshift($array_list, array('PO No: ',$new_order_no,'', '', ''));
            array_push($array_list, array('', '', '', '','-----------------'));
            array_push($array_list, array('', '', '', 'Total',$total_amount));
            //$normal_list = json_decode($j_list, true);

            //$return_list = json_decode($array_list, true);
            //dd($array_list);
            return $array_list;

            //----------------------------

        }
        else {
            $j_list = Order::
            //return DB::table('orders')
                join('company_products', 'company_products.id', '=', 'orders.product_id')
                ->whereNotIn('orders.order_no', [1])
                ->where('orders.order_no', '=', $this->id)
                ->select('company_products.product_category', 'company_products.product_name', 'orders.product_price', 'orders.product_quantity', 'orders.product_amount')
                ->get();

            $total_list = Order::
            //return DB::table('orders')
                join('company_products', 'company_products.id', '=', 'orders.product_id')
                ->join('clients', 'clients.clients_id', '=', 'orders.chemist_id')
                ->whereNotIn('orders.order_no', [1])
                ->where('orders.order_no', '=', $this->id)
                ->select('orders.order_no','orders.total_amount','clients.clients_name','clients.clients_add','orders.total_amount','orders.updated_at')
                ->get();

            $a_list = json_decode($total_list, true);
            $normal_list = json_decode($j_list, true);

            foreach ($a_list as $total) {
                $t_amount = $total['total_amount'];
                $client_name = $total['clients_name'];
                $client_add = $total['clients_add'];
                $order_no = $total['order_no'];
                $order_date = date_create($total['updated_at'])->format('j F, Y');
            }
            //dd($order_date);

            $new_order_no='PMS00'.$order_no.'';

            array_unshift($normal_list, array('Product Category','Product Name','Product Price', 'Product Quantity', 'Product Amount'));
            array_unshift($normal_list, array('','','', '', ''));
            array_unshift($normal_list, array('-----------------','','', '', ''));
            array_unshift($normal_list, array('Ordered Date',$order_date,'', '', ''));
            array_unshift($normal_list, array('Client Address',$client_add,'', '', ''));
            array_unshift($normal_list, array('Client Name',$client_name,'', '', ''));
            array_unshift($normal_list, array('PO No: ',$new_order_no,'', '', ''));
            array_push($normal_list, array('', '', '', '','-----------------'));
            array_push($normal_list, array('', '', '', 'Total',$t_amount));

            
            //$return_list = json_encode($normal_list);

            //dd($normal_list);

            return $normal_list;
        }

    }
}



/* else {

    class OrderExport implements FromArray {

        public function forId(int $id) {
            $this->id = $id;
            return $this;
        }

        public function array(): array {
            $j_list = Order::
            //return DB::table('orders')
                join('company_products', 'company_products.id', '=', 'orders.product_id')
                ->whereNotIn('orders.order_no', [1])
                ->where('orders.order_no', '=', $this->id)
                ->select('company_products.product_category', 'company_products.product_name', 'orders.product_price', 'orders.product_quantity', 'orders.product_amount')
                ->get();

            $total_list = Order::
            //return DB::table('orders')
                join('company_products', 'company_products.id', '=', 'orders.product_id')
                ->whereNotIn('orders.order_no', [1])
                ->where('orders.order_no', '=', $this->id)
                ->select('orders.total_amount')
                ->get();

            $a_list = json_decode($total_list, true);
            $normal_list = json_decode($j_list, true);

            foreach ($a_list as $total) {
                $t_amount = $total['total_amount'];
            }

            array_push($normal_list, array('', '', '', 'Total',$t_amount));

            
            //$return_list = json_encode($normal_list);

            //dd($return_list);

            return $normal_list;
        }

    }

} */
