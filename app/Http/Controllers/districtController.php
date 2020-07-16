<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class districtController extends Controller
{
    public function create(Request $request) {

        $this->validate($request,[
            'dist_no'=>'required|max:4|min:3|unique:\App\District',
            'dist_name'=>'required|max:100|min:5|unique:\App\District'
        ]);

        $district=new District();
        $district->dist_no=$request->dist_no;
        $district->dist_name=$request->dist_name;
        $district->pro_name=$request->pro_name;
        $district->status='active';
        $district->save();

        return redirect()->back()->with('message', 'successfully added');

    }
    
    public function view() {
        $last_dist_no=District::max('dist_no');
        $province=Province::where('status','active')->get();
        return view('Admin.add-district',["province"=>$province],["last_dist_no"=>$last_dist_no]);
    }

    public function viewedit() {
        $district = District::where('status','active')->get();
        return view('Admin.edit-district')->with('district', $district);
    }

    public function edit(Request $request) {
        
        $district = District::find($request->id);
        $district->dist_no=$request->dist_no;
        $district->dist_name=$request->dist_name;
        $district->pro_name=$request->pro_name;
        $district->status='active';
        $district->save();

        return redirect()->back()->with('message', 'successfully edited');

    }

    public function get($id) {

        $district = DB::table('districts')->where('pro_name', $id)->get()->toJson();

        return response()->json($district);

    }
}
