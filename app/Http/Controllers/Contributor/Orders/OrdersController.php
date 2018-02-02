<?php

namespace App\Http\Controllers\Contributor\Orders;
use DB,Auth,Redirect,PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use \Illuminate\Http\Response;

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
    
    //-----------------------------update order-------------------------------------------------
    public function updateOrder(Request $request)
    {      
         $user_id = Auth::user()->id;
        $uploadfiles_name = $request->input("uploadfiles_name");
        $remove_file_arr = explode(",",$uploadfiles_name);
      if (Input::hasFile('sample_logos')){
            $file = Input::file();
           for ($j=0; $j < count($file['sample_logos']); $j++) { 
              $sample_images_name_arr[] = $file['sample_logos'][$j]->getClientOriginalName();
            } 
           if(count($remove_file_arr) > 0){
              for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   if(in_array($sample_images_name_arr[$i], $remove_file_arr)){
                      //echo 'Delete Files '.$sample_images_name.'<br>';
                   }else{
                      $destinationPath = $file['sample_logos'][$i];  
                      $image_path ="public/uploads/order_logo/".$sample_images_name;  
                      move_uploaded_file($destinationPath, $image_path); 
                      $sample_images_arr[] = $sample_images_name;
                   }
              }
           }else{
               for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   $destinationPath = $file['sample_logos'][$i];  
                   $image_path ="public/uploads/order_logo/".$sample_images_name;  
                   move_uploaded_file($destinationPath, $image_path); 
                   $sample_images_arr[] = $sample_images_name;
               }
           }
        }
        $deigner_help_files_name = $request->input("deigner_help_files_name");
        $remove_deigner_help_files_arr = explode(",",$deigner_help_files_name);
          if ( Input::hasFile('deigner_help_imgs') ){
            $help_file = Input::file();
            for ($j=0; $j < count($help_file['deigner_help_imgs']); $j++) { 
              $deigner_help_imgs_arr[] = $help_file['deigner_help_imgs'][$j]->getClientOriginalName();
              } 
            if(count($remove_deigner_help_files_arr) > 0){
              for ($i=0; $i < count($help_file['deigner_help_imgs']) ; $i++) {
                   $deigner_help_name = $help_file['deigner_help_imgs'][$i]->getClientOriginalName();
                   if(in_array($deigner_help_imgs_arr[$i], $remove_deigner_help_files_arr)){
                   }else{
                      $destinationPath_help_imgs = $help_file['deigner_help_imgs'][$i];  
                      $deigner_help_image_path ="public/uploads/order_logo/".$deigner_help_name;  
                      move_uploaded_file($destinationPath_help_imgs, $deigner_help_image_path); 
                      $designer_help_images_arr[] = $deigner_help_name;
                   }
              }
             }else{
               for ($i=0; $i < count($help_file['deigner_help_imgs']) ; $i++) {
                   $deigner_help_name = $help_file['deigner_help_imgs'][$i]->getClientOriginalName();
                   $destinationPath_help_imgs = $help_file['deigner_help_imgs'][$i];  
                   $deigner_help_image_path ="public/uploads/order_logo/".$deigner_help_name;  
                   move_uploaded_file($destinationPath_help_imgs, $deigner_help_image_path); 
                   $designer_help_images_arr[] = $deigner_help_name;
               }
             }
      }
        
        $order_id                       =  $request->input("order_id");
        $orders                         =  \App\LogoOrder::find($order_id)->first();
        $orders->user_id                =  $user_id;
        $orders->order_type             =  $request->input("order_type");
        $orders->logo_name              =  $request->input("logo_name");
        $orders->logo_slogan            =  $request->input("slogan");
        $orders->logo_cat               =  $request->input("logo_category");
        $orders->logo_web_url           =  $request->input("website_url");
        $orders->logo_target_audience   =  $request->input("target_audience");
        $orders->logo_descrip           =  $request->input("descrp");
        $orders->logo_competitor_url    =  $request->input("compititor_url");
        $orders->logo_sample            =  Input::hasFile('sample_logos') ? implode(",",$sample_images_arr) : $orders->logo_sample;
        $orders->logo_visual_descp      =  $request->input("describe_imgs_dont_like");
        $orders->logo_visual_images     =  $request->input("describe_imgs_like");
        $orders->logo_type              =  implode(",",$request->input("logo_type"));
        $orders->logo_color             =  $request->input("choose_color");
        $orders->logo_other_color       =  $request->input("other_color");
        $orders->logo_usage             =  implode(",",$request->input("logo_usage"));
        $orders->logo_other_usage       =  $request->input("other_logo_usage");
        $orders->logo_fonts             =  implode(",",$request->input("font_type"));
        $orders->logo_other_fonts       =  $request->input("other_font_type");
        $orders->logo_feel              =  implode(",",$request->input("logo_feel"));
        $orders->communication_team     =  $request->input("communicate_designers");
        $orders->helpful_images         =  Input::hasFile('deigner_help_imgs') ? implode(",",$designer_help_images_arr) : $orders->helpful_images;
        $orders->updated_at             =  date("Y-m-d H:i:s");
        $orders->save();        
    return Redirect::back()->withMessage('Logo order Successfuly update.'); 
        
    }
    
    //------------------------------create order---------------------------------------
    public function create()
    {
        $packages     = \App\Packages::latest('id','asc')->get();              
        $package_adon = \App\PaymentAdons::latest('id','asc')->where('status',1)->get();       
        $logo_types = \App\logoType::latest('id','asc')->where('type_of_logo','logo_type')->where('status',1)->get();              
        $logo_feel = \App\logoType::latest('id','asc')->where('type_of_logo','logo_feel')->where('status',1)->get();              
        $logo_usage = \App\LogoUsage::latest('id','asc')->where('status',1)->get();              
        $logo_fonts = \App\LogoFonts::latest('id','asc')->where('status',1)->get(); 
        $setting=\App\AdminSettings::latest('id', 'asc')->first();          
        return view('contributor.orders.create',array('page_title'=>"Create New Order",'settings'=>$setting,'packages'=>$packages,'package_adon'=>$package_adon,'logo_types'=>$logo_types,'logo_feel'=>$logo_feel,'logo_usage'=>$logo_usage,'logo_fonts'=>$logo_fonts));
    }
    
    public function createorder(Request $request)
    {
        $user_id = Auth::user()->id;
        $uploadfiles_name = $request->input("uploadfiles_name");
      $remove_file_arr = explode(",",$uploadfiles_name);
      if ( Input::hasFile('sample_logos') ):
            $file = Input::file();
           for ($j=0; $j < count($file['sample_logos']); $j++) { 
              $sample_images_name_arr[] = $file['sample_logos'][$j]->getClientOriginalName();
            } 
           if(count($remove_file_arr) > 0){
              for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   if(in_array($sample_images_name_arr[$i], $remove_file_arr)){
                      //echo 'Delete Files '.$sample_images_name.'<br>';
                   }else{
                      $destinationPath = $file['sample_logos'][$i];  
                      $image_path ="public/uploads/order_logo/".$sample_images_name;  
                      move_uploaded_file($destinationPath, $image_path); 
                      $sample_images_arr[] = $sample_images_name;
                   }
              }
           }else{
               for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   $destinationPath = $file['sample_logos'][$i];  
                   $image_path ="public/uploads/order_logo/".$sample_images_name;  
                   move_uploaded_file($destinationPath, $image_path); 
                   $sample_images_arr[] = $sample_images_name;
               }
           }
      endif;
      $deigner_help_files_name = $request->input("deigner_help_files_name");
      $remove_deigner_help_files_arr = explode(",",$deigner_help_files_name);
      if ( Input::hasFile('deigner_help_imgs') ):
            $help_file = Input::file();
           for ($j=0; $j < count($help_file['deigner_help_imgs']); $j++) { 
              $deigner_help_imgs_arr[] = $help_file['deigner_help_imgs'][$j]->getClientOriginalName();
            } 
           if(count($remove_deigner_help_files_arr) > 0){
              for ($i=0; $i < count($help_file['deigner_help_imgs']) ; $i++) {
                   $deigner_help_name = $help_file['deigner_help_imgs'][$i]->getClientOriginalName();
                   if(in_array($deigner_help_imgs_arr[$i], $remove_deigner_help_files_arr)){
                   }else{
                      $destinationPath_help_imgs = $help_file['deigner_help_imgs'][$i];  
                      $deigner_help_image_path ="public/uploads/order_logo/".$deigner_help_name;  
                      move_uploaded_file($destinationPath_help_imgs, $deigner_help_image_path); 
                      $designer_help_images_arr[] = $deigner_help_name;
                   }
              }
           }else{
               for ($i=0; $i < count($help_file['deigner_help_imgs']) ; $i++) {
                   $deigner_help_name = $help_file['deigner_help_imgs'][$i]->getClientOriginalName();
                   $destinationPath_help_imgs = $help_file['deigner_help_imgs'][$i];  
                   $deigner_help_image_path ="public/uploads/order_logo/".$deigner_help_name;  
                   move_uploaded_file($destinationPath_help_imgs, $deigner_help_image_path); 
                   $designer_help_images_arr[] = $deigner_help_name;
               }
           }
      endif;
      
      //------------------------------Insert Orders in Database-----------------
      
      $orders = new \App\LogoOrder();
      $orders->user_id=$user_id;
      $orders->order_type=$request->input("order_type");
      $orders->logo_name=$request->input("logo_name");
      $orders->logo_slogan=$request->input("slogan");
      $orders->logo_cat=$request->input("logo_category");
      $orders->logo_web_url=$request->input("website_url");
      $orders->logo_target_audience=$request->input("target_audience");
      $orders->logo_descrip=$request->input("descrp");
      $orders->logo_competitor_url=$request->input("compititor_url");
      $orders->logo_sample= Input::hasFile('sample_logos') ? implode(",",$sample_images_arr) : '';
      $orders->logo_visual_descp=$request->input("describe_imgs_dont_like");
      $orders->logo_visual_images=$request->input("describe_imgs_like");
      $orders->logo_type=implode(",",$request->input("logo_type"));
      $orders->logo_color=$request->input("choose_color");
      $orders->logo_other_color=$request->input("other_color");
      $orders->logo_usage=implode(",",$request->input("logo_usage"));
      $orders->logo_other_usage=$request->input("other_logo_usage");
      $orders->logo_fonts=implode(",",$request->input("font_type"));
      $orders->logo_other_fonts=$request->input("other_font_type");
      $orders->logo_feel=implode(",",$request->input("logo_feel"));
      $orders->communication_team=$request->input("communicate_designers");
      $orders->helpful_images=Input::hasFile('deigner_help_imgs') ? implode(",",$designer_help_images_arr) : '';
      $orders->created_at=date("Y-m-d H:i:s");
      $orders->updated_at=date("Y-m-d H:i:s");
      $orders->save();
      $orderId = $orders->id;

    //------------------------------Insert Payment in Database-----------------

      $package_amount = $request->input("package_amount");
      $addon_amount = $request->input("addon_amount") ? $request->input("addon_amount"): 0;
      $total = ($package_amount + $addon_amount);
      $order_payment = new \App\OrdersPayment();
      $order_payment->order_id=$orderId;
      $order_payment->user_id=$user_id;
      $order_payment->order_type=$request->input("order_type");
      $order_payment->package_id=$request->input("package_name");
      $order_payment->coupon_id=NULL;
      $order_payment->payment_addon_id=$request->input("addon_name") ? $request->input("addon_name"): NULL;
      $order_payment->total_amount=$total;
      $order_payment->status=0;
      $order_payment->created_at=date("Y-m-d H:i:s");
      $order_payment->updated_at= date("Y-m-d H:i:s");
      $order_payment->save();
      $paymentId = $order_payment->id;
      $addon;
      $user = \App\User::find($user_id);
      $order = \App\LogoOrder::find($orderId);
      $package = \App\Packages::find($request->input("package_name"));
      $addon = \App\PaymentAdons::find($request->input("addon_name"));
      $payment = \App\OrdersPayment::find($paymentId);
      $setting = \App\AdminSettings::latest()->get();
     return Redirect::back()->withMessage('Logo order Successfuly Created.');        
    }
    
    //----------------------------------order used coupons--------------------------------------------------
    public function orderUseCoupon(Request $request)
    {
        $coupon_codes = \App\CouponCode::where('coupon_code',$request->input("coupon_code"))->first();   
        $get_couponId = json_decode($coupon_codes);
        $payment = \App\OrdersPayment::where('order_id',$request->input("order_id"))->first();
        $get_payment = json_decode($payment);
       
        if(isset($get_couponId->order_type_id) == $get_payment->order_type && $get_couponId->status == 1){
        $coupon_codes->status         = 0;        
        $coupon_codes->updated_at     = date("Y-m-d H:i:s");
        $coupon_codes->save();

        
        $payment->coupon_id = $get_couponId->id;        
        $payment->save();

        $user_used_coupon = new \App\UserusecCoupon();
        $user_used_coupon->coupon_id=$get_couponId->id;
        $user_used_coupon->order_id=$request->input("order_id");
        $user_used_coupon->user_id=$get_payment->user_id;
        $user_used_coupon->create_at=date("Y-m-d H:i:s");
        $user_used_coupon->updated_at= date("Y-m-d H:i:s");
        $user_used_coupon->save();                 
        return Redirect::back()->withMessage('Coupon code apply successfuly.');     
        }else{      
            return Redirect::back()->withError('Please use valid coupon.');     
           
        }
    }
    
    //----------------------------------payorder----------------------------------------------
     public function paymentOrder($order_id)
     {
         $orders = \App\LogoOrder::find($order_id);  
         $setting=\App\AdminSettings::latest('id', 'asc')->first(); 
         return view('contributor.orders.payorder')->with(array('page_title'=>'Pay Orders','order'=>$orders,'settings'=>$setting ));
     }
    
     //-------------------------------thanks pay----------------------------------------------
     public function paythanks()
     {
         return view('contributor.orders.paymentthanks',array('page_title'=>'Payment Thanks'));
     }
}
