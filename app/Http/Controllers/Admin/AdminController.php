<?php

namespace App\Http\Controllers\Admin;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_role = Auth::user()->user_role;
        if($user_role==2)
        { 
            $coupons      = \App\CouponCode::where('status','=','1')->count();
            $packages     = \App\Packages::latest('id', 'asc')->count();
            $logo_type    = \App\logoType::where('type_of_logo','=','logo_type')->count();
            $logo_feel    = \App\logoType::where('type_of_logo','=','logo_feel')->count();
            $payment_adon = \App\PaymentAdons::latest('id', 'asc')->count();
            $logo_usage   = \App\LogoUsage::latest('id', 'asc')->count();
            $logo_fonts   = \App\LogoFonts::latest('id', 'asc')->count();
            $orders       = \App\LogoOrder::latest('id', 'asc')->count();
            $users        = \App\User::where('user_role','=','3')->count();
            return view('admin.dashboard')->with('page_title', "Admin Dashboard")->with("coupon_codes",$coupons)->with("packages",$packages)->with("logo_type",$logo_type)->with("logo_feel",$logo_feel)->with("payment_adon",$payment_adon)->with("logo_usage",$logo_usage)->with("logo_fonts",$logo_fonts)->with('orders',$orders)->with('users',$users);
         }else
        {      
            Auth::logout();
            return redirect('login');
        }
        
    }
    
    public function changePassword()
    {
        $user_role = Auth::user()->user_role;
        if($user_role==2)
        {
         return view('admin.changepassword')->with('page_title', "Admin Dashboard");
        }else
        {      
            Auth::logout();
            return redirect('admin/login');
        }
    }
    
    public function resetPassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $password  = bcrypt($request->input('password'));
        DB::table('users')
                   ->where('id', $user_id)->update(
                    ['password' => $password]
        );        
        Auth::logout();
        return redirect('admin/login');
    }
    
    
    
}
