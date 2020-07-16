<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\User;
use App\Client;
use App\City;
use App\Province;
use App\District;
use App\Company;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * authentication.
     *
     *
     */
    public function auth(Request $request) {

        //$user=User::find($request->user_id);
        $user=DB::table('users')->where('user_id', $request->user_id)->where('status','active')->get();

        if(count($user)==1) {

            foreach ($user as $row) 
            if($request->password==$row->password) {
                Session::put('role', $row->role);
                Session::put('user_id', $row->user_id);

                if($row->role=="admin"){
                    $cities =  City::where('status','active')->get();
                    $company =  Company::where('status','active')->get();
                    $province =  Province::where('status','active')->get();
                    $district =  District::where('status','active')->get();
                    //return view('/admin/dashboard',["city"=>$cities,"province"=>$province,"district"=>$district,"company"=>$company]);
                    return redirect('/admin/dashboard')->with('city',$cities)->with('province',$province)->with('district',$district)->with('company',$company);
                }
                else if($row->role=="company"){
                    return redirect('/company/dashboard');
                }
                else if($row->role=="user"){
                    return redirect('/chemist/dashboard');
                }

            }
            else {
                return view('welcome',['error'=>'Password incorrect']);
            }
        }
        else {
            return view('welcome',['error'=>'Username incorrect']);
        }
    }

    public function regview(Request $request) {
        $this->validate($request,[
            'number'=>'required|digits:9',
        ]);

        Session::put('r_number', $request->number);
        return view('login-registration');
    }

    public function reguser(Request $request) {
        $this->validate($request,[
            'user_id'=>'required|max:12|min:9',
            'password'=>'required|min:5|max:20',
            'email'=>'required',
            'com_password'=>'required',
        ]);

        if($request->password==$request->com_password) {
            
            if(User::where('user_id',$request->user_id)->count()>0) {
                return view('login-registration')->with('emessage', 'this user name already exist');
            }
            else if(User::where('email',$request->email)->count()>0) {
                return view('login-registration')->with('emessage', 'this email already exist');
            }
            else {
                $user=new User();
                $user->user_id=$request->user_id;
                $user->role='user';
                $user->role_id=3;
                $user->password=$request->password;
                $user->email=$request->email;
                $user->status='active';
                $user->save();

                $city =  City::where('status','active')->get();
                $province =  Province::where('status','active')->get();
                $district =  District::where('status','active')->get();
                return view('profile-registration')->with('user_id',$request->user_id)->with('province',$province)->with('district',$district)->with('city',$city);
            }
            
        }
        else {
            return view('login-registration')->with('emessage', 'passwords are not match');
        }

       // $mobile=$request->number;
       // return view('login-registration',["mobile"=>$mobile]);
    }

    public function createpro(Request $request) {
        $this->validate($request,[
            'clients_name'=>'required|max:30|min:3',
            'clients_add'=>'required|min:5',
            'lat'=>'required',
            'long'=>'required',
        ]);

        $mobile=Session::get('r_number');

        $client=new Client();
        $client->clients_id=$request->user_id;
        $client->clients_name=$request->clients_name;
        $client->clients_add=$request->clients_add;
        $client->pro_name=$request->pro_name;
        $client->dist_name=$request->dist_name;
        $client->city_name=$request->city_name;
        $client->mobile=$mobile;
        $client->lat=$request->lat;
        $client->long=$request->long;
        $client->status='active';
        $client->save();

        Session::flush();
        return redirect('/')->with('message', 'successfully create profile login here!');
        
    }

    public function logout() {
        Session::flush();
        return redirect('/')->with('message', 'successfully loged out');
    }
}
