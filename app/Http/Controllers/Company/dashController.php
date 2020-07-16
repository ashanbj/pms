<?php

namespace App\Http\Controllers\Company;
use Illuminate\Support\Facades\Session;
use App\Company_product;
use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashController extends Controller
{
    public function view() {
        $user=Session::get('user_id');
        $email=Email::where('status','active')->where('company_id',$user)->get();
        $product=Company_product::where('status','active')->where('company_id',$user)->get();
        return view('Company/company-dashboard')->with('product',$product)->with('email',$email);
    }
}
