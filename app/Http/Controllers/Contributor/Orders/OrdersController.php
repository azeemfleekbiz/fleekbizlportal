<?php

namespace App\Http\Controllers\Contributor\Orders;
use DB,Auth,Redirect,PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    //--------------------------order list--------------------------------------
    public function index()
    {
        $user_id = Auth::user()->id;
        $orders = \App\LogoOrder::latest('id','asc')->where('user_id',$user_id)->get();  
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('contributor.orders.index',array('page_title'=>"Orders",'orders'=>$orders,'settings'=>$setting));
    }
    
    //-----------------------------view order detail----------------------------------
    public function viewOrder($order_id)
    {        
        $orders = \App\LogoOrder::find($order_id);  
        $user = \App\User::find($orders->user_id);        
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
        $payment = \App\OrdersPayment::find($orders->id);
        $packages = \App\Packages::find($payment->package_id);
        $order_type = \App\OrderType::find($orders->order_type);
        $payment_adon = \App\PaymentAdons::find($payment->payment_addon_id);
        $coupon_code  = \App\CouponCode::find($payment->coupon_id);
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('contributor.orders.view')->with(array('page_title'=>'View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code ));
        
    }
    
    
    //------------------------get complete orders list--------------------------------
    public function completOrders()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.status','=','1')->where('users.id','=',$user_id)
            ->get();
        //$orders  = \App\LogoOrder::latest('id','asc')->get();          
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('contributor.orders.complete')->with('page_title', "Complete Orders")->with('orders',$orders)->with('settings',$setting);
    }
    
    //------------------------get pending orders list--------------------------------
    public function pendingOrders()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.status','=','0')->where('users.id','=',$user_id)
            ->get();
        //$orders = \App\LogoOrder::latest('id','asc')->get();  
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('contributor.orders.pending')->with('page_title', "Pending Orders")->with('orders',$orders)->with('settings',$setting);
    }
    
    //------------------------get complete orders list--------------------------------
    public function paidOrders()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.is_paid','=','1')->where('users.id','=',$user_id)
            ->get();
        //$orders = \App\LogoOrder::latest('id','asc')->get();  
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('contributor.orders.paidorders')->with('page_title', "Paid Orders")->with('orders',$orders)->with('settings',$setting);
    }
    
    //------------------------get pending orders list--------------------------------
    public function unpaidOrders()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.is_paid','=','0')->where('users.id','=',$user_id)
            ->get();
        //$orders = \App\LogoOrder::latest('id','asc')->get();  
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        return view('contributor.orders.unpaidorders')->with('page_title', "Unpaid Orders")->with('orders',$orders)->with('settings',$setting);
    }
    
    //-------------------------------------edit user order---------------------------
    public function editOrder($order_id)
    {
        $user_id = Auth::user()->id;
        $orders = \App\LogoOrder::where('id',$order_id)->where('user_id',$user_id)->first();  
        
        if($orders)
        {
             $user = \App\User::find($user_id);                     
             $setting=\App\AdminSettings::latest('id', 'asc')->first(); 
             $logo_types = \App\logoType::latest('id','asc')->where('type_of_logo','logo_type')->where('status',1)->get();              
             $logo_feel = \App\logoType::latest('id','asc')->where('type_of_logo','logo_feel')->where('status',1)->get();              
             $logo_usage = \App\LogoUsage::latest('id','asc')->where('status',1)->get();              
             $logo_fonts = \App\LogoFonts::latest('id','asc')->where('status',1)->get(); 
             $logo_sample = explode(",", $orders->logo_sample);
             $help_ful_images = explode(",", $orders->helpful_images); 
             $logotypes = explode(",",$orders->logo_type);   
             $logousages = explode(",",$orders->logo_usage); 
             $logofonts = explode(",",$orders->logo_fonts); 
             $logofeel  = explode(",",$orders->logo_feel); 
             return view('contributor.orders.editorder', array('page_title'=>"Edit Orders",'order'=>$orders,'user'=>$user,'logo_types'=>$logo_types,'logo_feel'=>$logo_feel,'logo_usage'=>$logo_usage,'logo_fonts'=>$logo_fonts,'settings'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'logotypes'=>$logotypes,'logousages'=>$logousages,'logofonts'=>$logofonts,'logofeel'=>$logofeel));  
        }else
        {
            return Redirect::back()->withError('Error occured You have no access to edit order!'); 
        }
        
        
    }
    
}
