<?php

namespace App\Http\Controllers\Admin\LogoTypes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoTypeController extends Controller
{
    //----------------------get all logo types list-----------------//
    public function index()
    {
        return view('admin.logotypes.index')->with('page_title', "Admin Dashboard Coupons");
    }
}
