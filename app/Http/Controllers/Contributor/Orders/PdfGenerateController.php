<?php

namespace App\Http\Controllers\Contributor\Orders;
use DB;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PdfGenerateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //-----------------------generate Orders PDF--------------------------------
    public function orderPdfGenerate()
    {
        $user_id = Auth::user()->id;
        $orders = \App\LogoOrder::latest('id','asc')->where('user_id',$user_id)->get(); 
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        $pdf = PDF::loadView('contributor/orders/pdfview', array('page_title'=>'Generate Orders PDF Report','orders'=>$orders,'settings'=>$setting));
        return $pdf->download('invoice.pdf');
        
    }
    
    //------------------------------generate single order PDF--------------------------
    public function generateOrderPdf($order_id)
    {
        $orders = \App\LogoOrder::find($order_id);  
        $user = \App\User::find($orders->user_id);   
        /*
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
         */
        $payment = \App\OrdersPayment::find($orders->id);
        $packages = \App\Packages::find($payment->package_id);
        $order_type = \App\OrderType::find($orders->order_type);
        $payment_adon = \App\PaymentAdons::find($payment->payment_addon_id);
        $coupon_code  = \App\CouponCode::find($payment->coupon_id);
        $setting=\App\AdminSettings::latest('id', 'asc')->first();
        $pdf_name = $orders->logo_name.".pdf";
        $pdf = PDF::loadView('contributor/orders/pdforderview', array('page_title'=>'Order PDF','orders'=>$orders,'user'=>$user,'setting'=>$setting,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code));
        //$pdf = PDF::loadView('admin/orders/pdforderview', array('page_title'=>'Admin Dashboard View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code));
        return $pdf->download($pdf_name);
    }
    
    //--------------------------generate complete order PDF---------------------
    public function completeOrderPdfGenerate()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.status','=','1')->where('users.id','=',$user_id)
            ->get();
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        $pdf_name = "completeorders.pdf";
        $pdf = PDF::loadView('contributor/orders/pdfviewcomplete', array('page_title'=>'Generate Orders PDF Report','orders'=>$orders,'settings'=>$setting));
        //$pdf = PDF::loadView('admin/orders/pdforderview', array('page_title'=>'Admin Dashboard View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code));
        return $pdf->download($pdf_name);
        
    }
    //--------------------------generate complete pending PDF---------------------
    public function pendingOrderPdfGenerate()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.status','=','0')->where('users.id','=',$user_id)
            ->get();
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        $pdf_name = "pendingorders.pdf";
        $pdf = PDF::loadView('contributor/orders/pdfviewpending', array('page_title'=>'Generate Orders PDF Report','orders'=>$orders,'settings'=>$setting));
        //$pdf = PDF::loadView('admin/orders/pdforderview', array('page_title'=>'Admin Dashboard View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code));
        return $pdf->download($pdf_name);
    }
    
    //--------------------------generate Paid order PDF---------------------
    public function paidOrderPdfGenerate()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.is_paid','=','1')->where('users.id','=',$user_id)
            ->get();
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        $pdf_name = "paidorders.pdf";
        $pdf = PDF::loadView('contributor/orders/pdfviewpaid', array('page_title'=>'Generate Orders PDF Report','orders'=>$orders,'settings'=>$setting));
        //$pdf = PDF::loadView('admin/orders/pdforderview', array('page_title'=>'Admin Dashboard View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code));
        return $pdf->download($pdf_name);
    }
    
    //--------------------------generate unpaid  order PDF---------------------
    public function unpaidOrderPdfGenerate()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('logo_orders')
            ->join('orders_payments', 'logo_orders.id', '=', 'orders_payments.order_id')
            ->join('users', 'logo_orders.user_id', '=', 'users.id')
            ->select('logo_orders.id', 'logo_orders.logo_name', 'logo_orders.created_at', 'orders_payments.status','users.f_name','users.l_name','orders_payments.total_amount','orders_payments.is_paid')->where('orders_payments.is_paid','=','0')->where('users.id','=',$user_id)
            ->get();
        $setting=\App\AdminSettings::latest('id', 'asc')->first();  
        $pdf_name = "unpaidorders.pdf";
        $pdf = PDF::loadView('contributor/orders/pdfviewunpaid', array('page_title'=>'Generate Orders PDF Report','orders'=>$orders,'settings'=>$setting));
        //$pdf = PDF::loadView('admin/orders/pdforderview', array('page_title'=>'Admin Dashboard View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code));
        return $pdf->download($pdf_name);
    }
    
    
    
}
