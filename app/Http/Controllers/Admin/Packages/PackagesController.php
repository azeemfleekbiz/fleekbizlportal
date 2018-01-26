<?php

namespace App\Http\Controllers\Admin\Packages;
use DB;
use Redirect;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    //-----------------------all Packages List-----------------------------
    public function index()
    {
        $packages = \App\Packages::latest('id', 'asc')->get();      
        $ordertypes = \App\OrderType::latest('id', 'asc')->get();
        $setting=\App\AdminSettings::latest('id', 'asc')->first(); 
        return view('admin.packages.index')->with('page_title', "Admin Dashboard Packages")->with('packages',$packages)->with('order_types',$ordertypes)->with('settings',$setting);
    }
    
    //-------------------------------------save new package------------------------
    public function savePackage(Request $request)
    {
        $order_type_id  = $request->input("order_type_id");
        $title          = $request->input("title");
        $regular_price  = $request->input("regular_price");
        $sale_price     = $request->input("sale_price");
        $description    = $request->input("description");
        $created_at    = date("Y-m-d H:i:s"); 
        DB::table('packages')->insert(
                    ['order_type_id' => $order_type_id,'title' => $title,'sale_price' => $sale_price,'regular_price' => $regular_price,'descp' => $description, 'create_at' => $created_at, 'updated_at' => $created_at] );
        return Redirect::back()->withMessage('Package Successfuly Created.'); 
        
    }
    
    //----------------------------------update package-------------------------------
    public function updatePackage(Request $request)
    {
        $package_id     = $request->input("package_id");
        $order_type_id  = $request->input("order_type_id");
        $title          = $request->input("title");
        $regular_price  = $request->input("regular_price");
        $sale_price     = $request->input("sale_price");
        $description    = $request->input("description");
        $created_at    = date("Y-m-d H:i:s"); 
        DB::table('packages')->where('id', $package_id)->update(
                    ['order_type_id' => $order_type_id,'title' => $title,'sale_price' => $sale_price,'regular_price' => $regular_price,'descp' => $description,  'updated_at' => $created_at] );
        return Redirect::back()->withMessage('Package Successfuly update.'); 
    }        
            
   //----------------------------------delete package----------------------------------
    public function destroy($package_id)
    {        
       $package = \App\Packages::find($package_id);   
       $package->delete();     
       return Redirect::back()->withMessage('Pacakge Successfuly deleted.');  
    }
    
}
