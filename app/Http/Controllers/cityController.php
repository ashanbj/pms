<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use App\District;
use Illuminate\Http\Request;

class cityController extends Controller
{
    
    public function view() {
        $last_city_no=City::max('city_no');
        $province =  Province::where('status','active')->get();
        $district =  District::where('status','active')->get();
        return view('Admin.add-cities')->with("province",$province)->with("district",$district)->with("last_city_no",$last_city_no);
    }

    public function create(Request $request) {

        $this->validate($request,[
            'city_no'=>'required|max:4|min:3|unique:\App\City',
            'city_name'=>'required|max:100|min:5|unique:\App\City'
        ]);

        $city=new City();
        $city->city_no=$request->city_no;
        $city->city_name=$request->city_name;
        $city->dist_name=$request->dist_name;
        $city->pro_name=$request->pro_name;
        $city->status='active';
        $city->save();

        return redirect()->back()->with('message', 'successfully added');

    }

    public function viewedit() {
        $cities =  City::where('status','active')->get();
        return view('Admin.edit-cities')->with('city', $cities);
    }

    public function edit(Request $request) {
        
        $city = City::find($request->id);
        $city->city_no=$request->city_no;
        $city->city_name=$request->city_name;
        $city->dist_name=$request->dist_name;
        $city->pro_name=$request->pro_name;
        $city->status='active';
        $city->save();

        return redirect()->back()->with('emessage', 'successfully edited');

    }

    public function delete(Request $request) {
        
        $city = City::find($request->did);
        $city->status='deactive';
        $city->save();
        return redirect()->back()->with('dmessage', 'successfully deleted');
    }

    public function get($id) {
        
        $city = City::where('dist_name', $id)->get()->toJson();

        return response()->json($city);

    }
}
