<?php

namespace App\Http\Controllers\Admin\LogoFeel;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoFeelController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function index()
    {
        return view('admin.logofeel.index')->with('page_title', "Admin Dashboard Coupons");
    }
}
