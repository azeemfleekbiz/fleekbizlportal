<?php

namespace App\Http\Controllers\Admin\Packages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    //-----------------------all Packages List-----------------------------
    public function index()
    {
        return view('admin.packages.index')->with('page_title', "Admin Dashboard Packages");
    }
}
