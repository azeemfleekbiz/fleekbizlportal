<?php

namespace App\Http\Controllers\Admin\Orders;
use Auth;
use App\User;
use DB;
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
        $orders = \App\LogoOrder::latest('id','asc')->get();  
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('admin.orders.index')->with('page_title', "Admin Dashboard Orders")->with('orders',$orders)->with('settings',$setting);
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
        $logo_feel  = \App\logoType::find($logo_order_logo_feel);
        $logo_usage_input = explode(",", $orders->logo_usage);  
       	$logo_usage = \App\LogoUsage::find($logo_usage_input);
        $logo_font_input = explode(",", $orders->logo_fonts);  
        $logo_fonts = \App\LogoFonts::find($logo_font_input);
        $logo_sample = explode(",", $orders->logo_sample);  
        $help_ful_images = explode(",", $orders->helpful_images); 
        //$packages = \App\Packages::find($orders->logo_fonts);
        $setting=\App\AdminSettings::latest('id', 'asc')->get();  
        return view('admin.orders.view')->with(array('page_title'=>'Admin Dashboard View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images ));
        
    }
    
    
    //------------------------get complete orders list--------------------------------
    public function completOrders()
    {
        $orders = \App\LogoOrder::latest('id','asc')->get();  
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('admin.orders.complete')->with('page_title', "Admin Dashboard Orders")->with('orders',$orders)->with('settings',$setting);
    }
    
    //------------------------get pending orders list--------------------------------
    public function pendingOrders()
    {
        $orders = \App\LogoOrder::latest('id','asc')->get();  
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('admin.orders.pending')->with('page_title', "Admin Dashboard Orders")->with('orders',$orders)->with('settings',$setting);
    }
}
