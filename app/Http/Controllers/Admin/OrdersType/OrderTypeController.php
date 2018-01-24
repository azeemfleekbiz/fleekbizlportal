<?php

namespace App\Http\Controllers\Admin\OrdersType;
use DB;
use Redirect;
use Session;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderTypeController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    //------------------get order type list------------------------------
    public function index()
    {
        $ordertypes = \App\OrderType::latest('id', 'asc')->get();        
        return view('admin.ordertype.index')->with('page_title', "Admin Dashboard Order Types")->with("order_types",$ordertypes);
    }
    
    //-------------------------save order type-----------------------------
    public function saveOrderType(Request $request)
    {
        $name=$request->input("name");
        $created_at = date("Y-m-d H:i:s"); 
        DB::table('order_types')->insertGetId(
                    ['name' => $name, 'create_at' => $created_at, 'updated_at' => $created_at] );
        return Redirect::back()->withMessage('Order Type Successfuly Created.'); 
    }
    
    //----------------------------update order type----------------------------
    public function updateOrderType(Request $request)
    {
        $order_type_id  = $request->input("order_id");
        $name           = $request->input("name");
        $created_at     = date("Y-m-d H:i:s"); 
        DB::table('order_types')
                   ->where('id', $order_type_id)->update(
                    ['name' => $name,'updated_at' => $created_at] );
       return Redirect::back()->withMessage('Order Type Successfuly update.'); 
    }
    
    //------------------------delete order type---------------------------------
    public function destroy($order_type_id)
    {        
       $ordertype = \App\OrderType::find($order_type_id);   
       $ordertype->delete();     
       return Redirect::back()->withMessage('Order Type Successfuly deleted.');  
    }
}
