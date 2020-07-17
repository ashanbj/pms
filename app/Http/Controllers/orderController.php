<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function view() {
        $orders=Order::whereNotIn('order_no', [1])->groupBy('order_no')->get();
        return view('Admin/view-orders')->with('orders',$orders);
    }

    public function mark($id) {
        //$order=Order::where('order_no',$id)->get();
        //dd($order);
        /* foreach ($order->status as $stats) {
            $stats='deactive';
        } */
        
        $data= DB::table('orders')
        ->where('order_no', $id)
        ->update(['status' => 'deactive']);
        //dd($data);
        return redirect()->back()->with('message', 'successfully marked');

    }

    public function search(Request $request) {

        $range = explode(" - ",$request->date_range);

        $date1 = strtotime($range[0]);
        $date2 = strtotime($range[1]);
        $start = date('Y-m-d',$date1);
        $end = date('Y-m-d',$date2);
        //dd($end);

        $orders = Order::where('status', 'active')
           ->whereBetween('updated_at', [$start, $end])
           ->whereNotIn('order_no', [1])
           ->groupBy('order_no')
           ->get();

        //dd($orders);
        return view('Admin/view-orders')->with('orders',$orders);

    }

}
