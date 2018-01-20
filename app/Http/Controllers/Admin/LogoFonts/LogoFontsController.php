<?php

namespace App\Http\Controllers\Admin\LogoFonts;
use DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoFontsController extends Controller
{
   //----------------------get all logo types list-----------------//
    public function index()
    {
        $logofonts = \App\LogoFonts::latest('id', 'asc')->get();      
        $ordertypes = \App\OrderType::latest('id', 'asc')->get();
        return view('admin.logofonts.index')->with('page_title', "Admin Dashboard Logo Fonts")->with("logo_fonts",$logofonts)->with("order_types",$ordertypes);
    }
    
    //----------------------------add new logo----------------------------
    public function saveLogoFont(Request $request)
    {
        $order_type_id  = $request->input("order_type_id");
        $title          = $request->input("title");            
        $status=1;
        $created_at    = date("Y-m-d H:i:s"); 
        $this->validate($request, [
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
       if ($request->hasFile('img_path')) {
        $image = $request->file('img_path');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/logofonts');   
        $image_path ="uploads/logofonts/".$name;        
        DB::table('logo_font')->insert(
                    ['order_types' => $order_type_id,'title' => $title,'img_path' => $image_path,'status' => $status, 'create_at' => $created_at, 'updated_at' => $created_at] );
        $image->move($destinationPath, $name);
         return Redirect::back()->withMessage('Logo Fonts Successfuly Created.'); 
    } else {
        return Redirect::back()->withMessage('Error Occured Try again later.'); 
    }
    }
    
    
    //---------------------------------update logo type----------------------------
    public function updateLogoFont(Request $request)
    {       
        $logo_font_id         = $request->input("logo_font_id");  
        $order_type_id   = $request->input("order_type_id");
        $title           = $request->input("title");        
        $logo_image      = $request->input("logo_font_image");           
        $status          = 1;
        $created_at      = date("Y-m-d H:i:s");         
        $image  = $request->file('img_path');     
        if($image)
        {       
           $this->validate($request, [
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);              
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/logofonts');   
        $image_path ="uploads/logofonts/".$name;     
         DB::table('logo_font')->where('id', $logo_font_id)->update(
                    ['order_types' => $order_type_id,'title' => $title,'img_path' => $image_path ,'status' => $status, 'updated_at' => $created_at] );
         $image->move($destinationPath, $name);
         return Redirect::back()->withMessage('Logo Fonts Successfuly updated.');       
        }else {    
           DB::table('logo_font')->where('id', $logo_font_id)->update(
                    ['order_types' => $order_type_id,'title' => $title,'img_path' => $logo_image,'status' => $status, 'updated_at' => $created_at] );
         return Redirect::back()->withMessage('Logo Fonts Successfuly update.'); 
                  
       }
    }
       
    //----------------------------delete image------------------------------------
    public function destroy($logo_font_id)
    {        
       $logofonts = \App\LogoFonts::find($logo_font_id);   
       $logofonts->delete();     
       return Redirect::back()->withMessage('Logo Font Successfuly deleted.');  
    }    
    
}
