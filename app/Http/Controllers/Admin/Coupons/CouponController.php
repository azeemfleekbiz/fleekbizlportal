<?php

namespace App\Http\Controllers\Admin\Coupons;
use DB,Redirect;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //----------------------------------get coupon code list-----------------------------
    public function index()
    {
        $coupon_codes = \App\CouponCode::latest('id', 'asc')->where('status','=','1')->get();   
        $ordertypes = \App\OrderType::latest('id', 'asc')->get();
        return view('admin.coupons.index')->with('page_title', "Admin Dashboard Codes")->with("coupon_codes",$coupon_codes)->with("order_types",$ordertypes);
    }
    
    //-----------------------------create new coupon code---------------------------------
    public function saveCouponCode(Request $request)
    {
        if($request->get('coupon_code')) {      
           $coupon_code = \App\CouponCode::where('coupon_code' , '=', $request->get('coupon_code'))->first();  //--get coupon by coupon code--//
          if($coupon_code==NULL  OR $coupon_code->coupon_code!=$request->get('coupon_code'))
          {    
            $coupons = new \App\CouponCode();
            $coupons->order_type_id  = $request->input('order_type_id');        
            $coupons->coupon_code    = $request->input('coupon_code');
            $coupons->price          = $request->input('price');
            $coupons->descp          = $request->input('description');
            $coupons->status         = 1;
            $coupons->create_at      = date("Y-m-d H:i:s");
            $coupons->updated_at     = date("Y-m-d H:i:s");
            $coupons->save();
            return Redirect::back()->withMessage('Coupon Code Successfuly Created.'); 
          }else
          {                    
            return Redirect::back()->withMessage('Error occured Coupon Already Exists!'); 
          }
        }
        
    }
    //-----------------------------update coupon code-------------------------------------
    public function updateCouponCode(Request $request)
    {   
        $coupons = \App\CouponCode::find($request->input('coupon_code_id'));
        if($coupons)
        {            
            $coupons->order_type_id  = $request->input('order_type_id');        
            $coupons->coupon_code    = $request->input('coupon_code');
            $coupons->price          = $request->input('price');
            $coupons->descp          = $request->input('description');
            $coupons->status         = 1;        
            $coupons->updated_at     = date("Y-m-d H:i:s");
            $coupons->save();
           return Redirect::back()->withMessage('Coupon Code Successfuly Updated.');
        }else
        {
           return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
    }
    
    //-----------------------------delet coupon code--------------------------------------
    public function destroy($coupon_id)
    {
         $coupons = \App\CouponCode::find($coupon_id);   
         $coupons->delete();     
        return Redirect::back()->withMessage('Logo Font Successfuly deleted.');  
    }
    
    //------------------------------used coupons lis--------------------------------------
    public function usedCoupons()
    {
        $setting       =\App\AdminSettings::latest('id', 'asc')->first(); 
        $used_coupons  = \App\UserusecCoupon::latest('id', 'asc')->get(); 
        return view('admin.coupons.used_coupons',array('page_title'=>'Used Coupons Codes','used_coupons'=>$used_coupons,'settings'=>$setting));
    }
}
