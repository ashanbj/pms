<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function create(Request $request) {

        $this->validate($request,[
            'user_id'=>'required|max:20|min:3|unique:\App\User',
            'sup_name'=>'required|max:100|min:5',
            'contact_no'=>'required|size:10',
            'tell_no'=>'required|size:10',
            'email'=>'required|unique:\App\User',
        ]);

        $company=new Company();
        $company->sup_name=$request->sup_name;
        $company->sup_add=$request->sup_add;
        $company->contact_no=$request->contact_no;
        $company->contact_per=$request->contact_per;
        $company->user_id=$request->user_id;
        $company->tell_no=$request->tell_no;
        $company->designation=$request->designation;
        $company->email=$request->email;
        $company->password=$request->password;
        $company->status='active';
        $company->save();

        $user=new User();
        $user->user_id=$request->user_id;
        $user->role='company';
        $user->role_id=2;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->status='active';
        $user->save();

        return redirect()->back()->with('message', 'successfully added');
    }
    public function view() {
        return view('Admin.add-companies');
    }

    public function gettwo($id) {
        
        $city = Company::where('status','active')->whereNotIn('user_id', [$id])->get()->toJson();

        return response()->json($city);

    }

}
