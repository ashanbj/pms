<?php

namespace App\Http\Controllers;
use App\Company;
use App\Province;
use App\District;
use App\City;
use Illuminate\Http\Request;

class dashController extends Controller
{
    public function view() {
        $last_city_no=City::max('city_no');
        $province =  Province::where('status','active')->get();
        $company =  Company::where('status','active')->get();
        $district = District::where('status','active')->get();
        $cities =  City::where('status','active')->get();
        return view('Admin.dashboard',["city"=>$cities,"province"=>$province,"district"=>$district,"company"=>$company,"last_city_no"=>$last_city_no]);
    }
}
