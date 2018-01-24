<?php

namespace App\Http\Controllers\auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContributorAdminController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }


    public function showLoginForm()
    {
        return view("auth.contributor-login");
    }
    
    public function login(Request $request)
    {
        //----------validate form data---------------
        $this->validate($request, [
           'email'=>'required|email',
            'password'=>'required'
        ]);
        
        //--------------Atempt to login--------------
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
        {
             // if successful then redirect to intended locations
            return redirect('contributor/dashboard');
        } else {
             // if unsucceful then redirect to login form
             return redirect()->back()->withInput($request->only('email','remember'));
        } 
           
          
       
    }
}
