<?php

namespace App\Http\Controllers\Admin\LogoUsage;
use DB;
use Redirect;   
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoUsageController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    //----------------------get all logo usage list-----------------//
    public function index()
    {
        $logo_usage = \App\LogoUsage::latest('id', 'desc')->get();      
        $ordertypes = \App\OrderType::latest('id', 'asc')->get();
        return view('admin.logousage.index')->with('page_title', "Admin Dashboard Logo Usage")->with("logo_usage",$logo_usage)->with("order_types",$ordertypes);
    }
    
    //----------------------------create new logo usage-------------------------
    public function saveLogoUsage(Request $request)
    {
        $order_type_id  = $request->input("order_type_id");
        $title          = ucfirst($request->input("title"));
        $description   =  $request->input("description");         
        $status=1;
        $created_at    = date("Y-m-d H:i:s"); 
        DB::table('logo_usage')->insert(
                    ['order_types' => $order_type_id,'title' => $title,'descp' => $description,'status' => $status, 'create_at' => $created_at, 'updated_at' => $created_at] );
         return Redirect::back()->withMessage('Logo usage Successfuly Created.'); 
        }
    
    //------------------------------update logo usage---------------------------
    public function updateLogoUsage(Request $request)
    {
        $logo_usage_id  = $request->input("logo_usage_id");
        $order_type_id  = $request->input("order_type_id");
        $title          = ucfirst($request->input("title"));
        $description   =  $request->input("description");            
        $status=1;
        $created_at    = date("Y-m-d H:i:s"); 
        DB::table('logo_usage')->where('id', $logo_usage_id)->update(
                    ['order_types' => $order_type_id,'title' => $title,'descp' => $description,'status' => $status, 'updated_at' => $created_at] );
        return Redirect::back()->withMessage('Logo usage Successfuly update.');  
    }
    
    //-------------------------------delete logo usage--------------------------
    public function destroy($logo_usage_id)
    {
       $logo_usage = \App\LogoUsage::find($logo_usage_id);   
       $logo_usage->delete();     
       return Redirect::back()->withMessage('Logo usage Successfuly deleted.'); 
    }
}
