<?php

namespace App\Http\Controllers\auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin');
    }


    public function showLoginForm()
    {
        return view("auth.admin-login");
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
            return redirect('admin/dashboard');
        } else {
             // if unsucceful then redirect to login form
             return redirect()->back()->withInput($request->only('email','remember'));
        } 
           
          
       
    }
}
