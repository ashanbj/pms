<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    
    public function view() {
        $last_category_no=Product::max('category_no');
        $product=Product::where('status','active')->get();
        return view('Admin/add-products')->with('product',$product)->with('last_category_no',$last_category_no);
    }

    public function create(Request $request) {

        $this->validate($request,[
            'category_no'=>'required|max:10|min:3',
            'category_name'=>'required|max:100|min:5'
        ]);

        //must add DB
        //$count=DB::table('products')->where('category_no',$request->category_no)->count();

        if(Product::where('category_no',$request->category_no)->count()>0) {
            return redirect()->back()->with('emessage', 'this catagory no. already exist');
        }
        else if(Product::where('category_name',$request->category_name)->count()>0) {
            return redirect()->back()->with('emessage', 'this catagory name already exist');
        }
        else {
            $product=new Product();
            $product->category_no=$request->category_no;
            $product->category_name=$request->category_name;
            $product->status='active';
            $product->save();
            return redirect()->back()->with('message', 'successfully added');
        }
    }

    public function viewedit() {
        $product=Product::where('status','active')->get();
        return view('Admin/edit-product-category')->with('product',$product);
    }

    public function edit(Request $request) {

        $this->validate($request,[
            'category_no'=>'required|max:10|unique:\App\Product',
            'category_name'=>'required|max:100|min:5|unique:\App\Product'
        ]);

        //must add DB
        //$count=DB::table('products')->where('category_no',$request->category_no)->count();

        //if(Product::where('category_no',$request->category_no)->count()>0) {
           // return redirect()->back()->with('emessage', 'this catagory no. already exist');
        //}
        //else if(Product::where('category_name',$request->category_name)->count()>0) {
         //   return redirect()->back()->with('emessage', 'this catagory name already exist');
       // }
       
            $product=Product::find($request->id);
            $product->category_no=$request->category_no;
            $product->category_name=$request->category_name;
            $product->save();
            return redirect()->back()->with('message', 'successfully edited');
    }

    public function delete(Request $request) {
        
        $product = Product::find($request->did);
        $product->status='deactive';
        $product->save();
        return redirect()->back()->with('dmessage', 'successfully deleted');
    }
}
