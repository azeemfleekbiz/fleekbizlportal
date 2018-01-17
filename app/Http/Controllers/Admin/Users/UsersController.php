<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //------------------------get all users list------------------------------------//
    public function index()
    {
        return view('admin.users.index')->with('page_title', "Admin Dashboard Users");
    }
}
