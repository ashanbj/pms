<?php

namespace App\Http\Controllers\Chemist;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Session;
use App\Company_product;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function view() {
        $user=Session::get('user_id');
        $product=Company_product::where('status','active')->get();
        $last_order_no=Order::max('order_no');
        $order_no=$last_order_no+1;
        return view('Chemist/chemist-place-order')->with('product',$product)->with('user',$user)->with('order_no',$order_no);
    }

    public function getCategory() {
        
        $category = Product::where('status', 'active')->get()->toJson();
    
        return response()->json($category);
    
    }

    public function create(Request $request) {
            if(count($request->product_id)>0) {
                foreach($request->product_id as $item=>$v) {
                    $data2=array(
                        'order_no' => $request->order_no,
                        //'category_id' => $request->category_id[$item],
                        'product_id' => $request->product_id[$item],
                        'product_price' => $request->product_price[$item],
                        'product_quantity' => $request->product_quantity[$item],
                        'product_amount' => $request->product_amount[$item],
                        'total_amount' => $request->total_amount,
                        'chemist_id' => Session::get('user_id'),
                        'status' => 'active'
                    );
                    Order::insert($data2);
                    //dd($data2);
                }
            }
            return redirect()->back()->with('message', 'successfully added');
    }
}