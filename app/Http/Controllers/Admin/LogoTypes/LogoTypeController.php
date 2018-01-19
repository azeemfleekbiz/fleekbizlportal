<?php

namespace App\Http\Controllers\Admin\LogoTypes;
use DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogoTypeController extends Controller
{
    //----------------------get all logo types list-----------------//
    public function index()
    {
        $logotypes = \App\logoType::latest('id', 'asc')->get();      
        $ordertypes = \App\OrderType::latest('id', 'asc')->get();
        return view('admin.logotypes.index')->with('page_title', "Admin Dashboard Logo Type")->with("logo_types",$logotypes)->with("order_types",$ordertypes);
    }
    
    //----------------------------add new logo----------------------------
    public function saveLogoType(Request $request)
    {
        $order_type_id  = $request->input("order_type_id");
        $title          = ucfirst($request->input("title"));
        $type_of_logo   =  $request->input("type_of_logo");         
        $status=1;
        $created_at    = date("Y-m-d H:i:s"); 
        $this->validate($request, [
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
       if ($request->hasFile('img_path')) {
        $image = $request->file('img_path');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/logotypes');   
        $image_path ="uploads/logotypes/".$name;        
        DB::table('logo')->insert(
                    ['order_types' => $order_type_id,'title' => $title,'img_path' => $image_path,'type_of_logo' => $type_of_logo,'status' => $status, 'create_at' => $created_at, 'updated_at' => $created_at] );
        $image->move($destinationPath, $name);
         return Redirect::back()->withMessage('Logo Successfuly Created.'); 
    } else {
        return Redirect::back()->withMessage('Error Occured Try again later.'); 
    }
    }
    
    
    //---------------------------------update logo type----------------------------
    public function updateLogoType(Request $request)
    {       
        $logo_id         = $request->input("logo_id");  
        $order_type_id   = $request->input("order_type_id");
        $title           = $request->input("title");
        $type_of_logo    = $request->input("type_of_logo");  
        $logo_image      = $request->input("logo_image");           
        $status          = 1;
        $created_at      = date("Y-m-d H:i:s");         
        $image  = $request->file('img_path');     
        if($image)
        {       
           $this->validate($request, [
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);              
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/logotypes');   
        $image_path ="uploads/logotypes/".$name;     
         DB::table('logo')->where('id', $logo_id)->update(
                    ['order_types' => $order_type_id,'title' => $title,'img_path' => $image_path,'type_of_logo' => $type_of_logo,'status' => $status, 'updated_at' => $created_at] );
         $image->move($destinationPath, $name);
         return Redirect::back()->withMessage('Logo Successfuly updated.');       
        }else {    
           DB::table('logo')->where('id', $logo_id)->update(
                    ['order_types' => $order_type_id,'title' => $title,'img_path' => $logo_image,'type_of_logo' => $type_of_logo,'status' => $status, 'updated_at' => $created_at] );
         return Redirect::back()->withMessage('Logo Successfuly update.'); 
                  
       }
    }
       
    //----------------------------delete image------------------------------------
    public function destroy($logo_id)
    {        
       $package = \App\logoType::find($logo_id);   
       $package->delete();     
       return Redirect::back()->withMessage('Logo Successfuly deleted.');  
    }    
    
    
    
}
