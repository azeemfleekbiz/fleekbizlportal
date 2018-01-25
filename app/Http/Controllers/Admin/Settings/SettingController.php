<?php

namespace App\Http\Controllers\Admin\Orders;
use Auth;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   //-----------------------get all orders list
    public function index()
    {
        $orders = \App\LogoOrder::latest('id','asc')->get();       
        return view('admin.orders.index')->with('page_title', "Admin Dashboard Orders")->with('orders',$orders);
    }
    
    //-----------------------------view order detail----------------------------------
    public function viewOrder($order_id)
    {     
   
        $orders = \App\LogoOrder::find($order_id);  
        $user = \App\User::find($orders->user_id);
        $order_type = \App\OrderType::find($orders->order_type);
        $logo_order_logo_type = explode(",", $orders->logo_type);        
        $logo_type = \App\logoType::find($logo_order_logo_type);
        $logo_order_logo_feel = explode(",", $orders->logo_feel);        
        $logo_feel = \App\logoType::find($logo_order_logo_type);
       	$logo_usage ;
        $logo_fonts;
        return view('admin.orders.view')->with('page_title', "Admin Dashboard View Orders")->with('orders',$logo_type);
        
    }
}
