<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class provinceConroller extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function view() {
        $last_pro_no=Province::max('pro_no');
        return view('Admin.add-province')->with("last_pro_no",$last_pro_no);
    }

    public function create(Request $request) {

        $this->validate($request,[
            'pro_no'=>'required|max:4|min:3|unique:\App\Province',
            'pro_name'=>'required|max:100|min:5|unique:\App\Province'
        ]);

        $province=new Province();
        $province->pro_no=$request->pro_no;
        $province->pro_name=$request->pro_name;
        $province->status='active';
        $province->save();

        return redirect()->back()->with('message', 'successfully added');

    }

    public function viewedit() {
        $province=Province::where('status','active')->get();
        return view('Admin/edit-province')->with('province',$province);

    }

    
    public function edit(Request $request) {

        $this->validate($request,[
            'pro_no'=>'required|max:10',
            'pro_name'=>'required|max:100|min:5|unique:\App\Province'
        ]);

        //must add DB
        //$count=DB::table('products')->where('category_no',$request->category_no)->count();

        //if(Product::where('category_no',$request->category_no)->count()>0) {
           // return redirect()->back()->with('emessage', 'this catagory no. already exist');
        //}
        //else if(Product::where('category_name',$request->category_name)->count()>0) {
         //   return redirect()->back()->with('emessage', 'this catagory name already exist');
       // }
       
            $province=Province::find($request->id);
            $province->pro_no=$request->pro_no;
            $province->pro_name=$request->pro_name;
            $province->save();
            return redirect()->back()->with('message', 'successfully edited');
    }


    public function get() {
        
        $city = Province::where('status', 'active')->get()->toJson();

        return response()->json($city);

    }

}
