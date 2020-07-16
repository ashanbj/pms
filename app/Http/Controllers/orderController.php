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
}
