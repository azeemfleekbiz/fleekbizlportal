<?php

namespace App\Http\Controllers\Admin\Orders;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   //-----------------------get all orders list
    public function index()
    {
        return view('admin.orders.index')->with('page_title', "Admin Dashboard Orders");
    }
}
