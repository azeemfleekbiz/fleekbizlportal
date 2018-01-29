<?php

namespace App\Http\Controllers\Admin\Users;
use DB,Auth,Redirect;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   //-----------------------get all payments list
    public function index()
    {
        $users     = \App\User::latest('id', 'asc')->where('user_role','=','3')->get();
        $setting=\App\AdminSettings::latest('id', 'asc')->first(); 
        return view('admin.users.index')->with(array('page_title'=>'Admin Dashboard Users','users'=>$users,'settings'=>$setting));
    }
    
    //---------------------------------user pdf generate--------------------------
    public function userPdfGenerate()
    {
        $users = \App\User::latest('id', 'asc')->where('user_role','=','3')->get();
        $setting=\App\AdminSettings::latest('id', 'asc')->first(); 
        $pdf_name = "users.pdf";
        $pdf = PDF::loadView('admin/users/pdfviewusers', array('page_title'=>'Generate Users PDF Report','users'=>$users,'settings'=>$setting));
        //$pdf = PDF::loadView('admin/orders/pdforderview', array('page_title'=>'Admin Dashboard View Orders','orders'=>$orders,'user'=>$user,'logo_type'=>$logo_type,'logo_feel'=>$logo_feel,'logo_usages'=>$logo_usage,'logo_fonts'=>$logo_fonts,'setting'=>$setting,'logo_samples'=>$logo_sample,'help_ful_images'=>$help_ful_images,'packages'=>$packages,'order_type'=>$order_type,'payment_adon'=>$payment_adon,'payment'=>$payment,'settings'=>$setting,'coupon_code'=>$coupon_code));
        return $pdf->download($pdf_name);
    }
}
