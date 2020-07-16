<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function create(Request $request) {
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
}
