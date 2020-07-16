<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

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
        $province=new Province();
        $province->pro_no=$request->pro_no;
        $province->pro_name=$request->pro_name;
        $province->status='active';
        $province->save();

        return redirect()->back()->with('message', 'successfully added');

    }

    public function get() {
        
        $city = Province::where('status', 'active')->get()->toJson();

        return response()->json($city);

    }

}
