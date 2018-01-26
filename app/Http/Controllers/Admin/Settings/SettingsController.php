<?php

namespace App\Http\Controllers\Admin\Settings;
use Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   //-----------------------get all orders list
    public function index()
    {
        $setting=\App\AdminSettings::latest('id', 'asc')->get();  
        return view('admin.settings.index')->with('page_title', "Admin Dashboard Setting")->with('settings',$setting);
    }
    
    //------------------------------add new currency---------------------------------
    public function create(Request $request)
    {
       $user_id = Auth::user()->id;
       $setting = new \App\AdminSettings();       
       $setting->user_id                =   $user_id;
       $setting->site_currency_code     =   $request->input('currency_Code');
       $setting->site_currency_symbol   =   $request->input('currency_symbol');
       $setting->payment_email          =   $request->input('payment_email');
       $setting->payment_mood           =   $request->input('payment_mood');
       $setting->created_at             =   date("Y-m-d H:i:s");
       $setting->updated_at             =   date("Y-m-d H:i:s");
       $setting->save();
       return Redirect::back()->withMessage('Settings Successfuly Created.'); 
    }
    
    //----------------------------update Currency-----------------------------------
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;      
        $setting = \App\AdminSettings::find($request->input('setting_id'));
        $setting->user_id                =   $user_id;
        $setting->site_currency_code     =   $request->input('currency_Code');
        $setting->site_currency_symbol   =   $request->input('currency_symbol');
        $setting->payment_email          =   $request->input('payment_email');
        $setting->payment_mood           =   $request->input('payment_mood');
        $setting->created_at             =   date("Y-m-d H:i:s");
        $setting->updated_at             =   date("Y-m-d H:i:s");
        $setting->save();
       return Redirect::back()->withMessage('Settings Successfuly Created.'); 
        
        
    }
}
