<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\City;
use App\Province;
use App\District;
use App\Company;
use App\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{

    public function search(Request $request) {

        if( !isset($request->pro_name) && !isset($request->city_name) && !isset($request->dist_name) && !isset($request->clients_name) ) {
            Session::flash('dmessage','Select an item to search');
        }
        else if( isset($request->pro_name) && isset($request->city_name) && isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( isset($request->pro_name) && isset($request->city_name) && isset($request->dist_name) && !isset($request->clients_name) ) {
            if(Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( isset($request->pro_name) && isset($request->city_name) && !isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->where('clients_name',$request->clients_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( isset($request->pro_name) && !isset($request->city_name) && isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('pro_name',$request->pro_name)->where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('pro_name',$request->pro_name)->where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( !isset($request->pro_name) && isset($request->city_name) && isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( isset($request->pro_name) && isset($request->city_name) && !isset($request->dist_name) && !isset($request->clients_name) ) {
            if(Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->count()==0) {$district =  District::all();
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('pro_name',$request->pro_name)->where('city_name',$request->city_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( isset($request->pro_name) && !isset($request->city_name) && !isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('pro_name',$request->pro_name)->where('clients_name',$request->clients_name)->count()==0) {$district =  District::all();
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('pro_name',$request->pro_name)->where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( !isset($request->pro_name) && !isset($request->city_name) && isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->count()==0) {$district =  District::all();
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('dist_name',$request->dist_name)->where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( !isset($request->pro_name) && isset($request->city_name) && isset($request->dist_name) && !isset($request->clients_name) ) {
            if(Client::where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('city_name',$request->city_name)->where('dist_name',$request->dist_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( !isset($request->pro_name) && isset($request->city_name) && !isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('city_name',$request->city_name)->where('clients_name',$request->clients_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('city_name',$request->city_name)->where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( isset($request->pro_name) && !isset($request->city_name) && !isset($request->dist_name) && !isset($request->clients_name) ) {
            if(Client::where('pro_name',$request->pro_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('pro_name',$request->pro_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( !isset($request->pro_name) && isset($request->city_name) && !isset($request->dist_name) && !isset($request->clients_name) ) {
            if(Client::where('city_name',$request->city_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('city_name',$request->city_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( !isset($request->pro_name) && !isset($request->city_name) && isset($request->dist_name) && !isset($request->clients_name) ) {
            if(Client::where('dist_name',$request->dist_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('dist_name',$request->dist_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }
        else if( !isset($request->pro_name) && !isset($request->city_name) && !isset($request->dist_name) && isset($request->clients_name) ) {
            if(Client::where('clients_name',$request->clients_name)->count()==0) {
                Session::flash('emessage','No data found');
            }
            else {
                $cities =  City::where('status','active')->get();
                $company =  Company::where('status','active')->get();
                $province =  Province::all();
                $district =  District::all();
                $client=Client::where('clients_name',$request->clients_name)->get();
                Session::flash('message','Data Found');
                return view('Admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company)->with('client',$client);
            }
        }

        //return view('Admin/dashboard');
        return redirect()->action('dashController@view');

    }

    public function get($id) {
        $city = Client::where('city_name', $id)->get()->toJson();

        return response()->json($city);
    }

}