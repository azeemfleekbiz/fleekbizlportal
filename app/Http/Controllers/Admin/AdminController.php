<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_role = Auth::user()->user_role;
        if($user_role==2)
        {         
        return view('admin.dashboard')->with('page_title', "Admin Dashboard");
        }else
        {      
            Auth::logout();
            return redirect('login');
        }
        
    }
}
