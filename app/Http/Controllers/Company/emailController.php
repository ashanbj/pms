<?php

namespace App\Http\Controllers\Company;

use Illuminate\Support\Facades\Session;
use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class emailController extends Controller
{
    public function view() {
        $user=Session::get('user_id');
        $email=Email::where('status','active')->where('company_id',$user)->get();
        return view('Company/add-emails')->with('email',$email);
    }
    public function create(Request $request) {
        $this->validate($request,[
            'email'=>'required',
            'name'=>'required|max:50|min:3',
            'designation'=>'required'
        ]);
        
        $user=Session::get('user_id');
        if(Email::where('email',$request->email)->count()>0) {
            return redirect()->back()->with('emessage', 'this email address already exist');
        }
        else {
            $email=new Email();
            $email->email=$request->email;
            $email->name=$request->name;
            $email->designation=$request->designation;
            $email->company_id=$user;
            $email->status='active';
            $email->save();
            return redirect()->back()->with('message', 'successfully added');
        }
    }
    public function delete(Request $request) {
        $email = Email::find($request->did);
        $email->status='deactive';
        $email->save();
        return redirect()->back()->with('dmessage', 'successfully deleted');
    }
}
