<?php

namespace App\Http\Controllers\Admin\Coupons;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    {
        return view('admin.coupons.index')->with('page_title', "Admin Dashboard Coupons");
    }
}
