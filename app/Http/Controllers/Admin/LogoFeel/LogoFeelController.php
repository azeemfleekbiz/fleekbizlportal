<?php

namespace App\Http\Controllers\Admin\LogoFeel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoFeelController extends Controller
{
   public function index()
    {
        return view('admin.logofeel.index')->with('page_title', "Admin Dashboard Coupons");
    }
}
