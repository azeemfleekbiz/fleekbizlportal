<?php

namespace App\Http\Controllers\Admin\PaymentAdons;
use DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentAdonsController extends Controller
{
    //----------------------get all Payment Adons list-----------------//
    public function index()
    {
        $payments_adons = \App\PaymentAdons::latest('id', 'asc')->get();      
        $ordertypes = \App\OrderType::latest('id', 'asc')->get();
        return view('admin.paymentsadons.index')->with('page_title', "Admin Dashboard Payments Adons")->with("payments_adons",$payments_adons)->with("order_types",$ordertypes);
    }
    
    //--------------------------------save payment adons--------------------------
    public function savePaymentAdon(Request $request)
    {        
        $this->validate($request, [
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/paymentadons');   
            $image_path ="uploads/paymentadons/".$name;     
            $created_at    = date("Y-m-d H:i:s"); 
            $payment_adon = new \App\PaymentAdons();
            $payment_adon->order_type_id  = $request->input('order_type_id');
            $payment_adon->title          = $request->input('title');
            $payment_adon->img_path       = $image_path;
            $payment_adon->price          = $request->input('price');
            $payment_adon->descp          = $request->input('description');
            $payment_adon->status         = 1;
            $payment_adon->create_at      = $created_at;
            $payment_adon->updated_at     = $created_at;
            $payment_adon->save();
            $image->move($destinationPath, $name);
            return Redirect::back()->withMessage('Payment Adnon Successfuly Created.'); 
        } else {
            return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
        
        
        
    }
    
    //------------------------------update payment adons--------------------------
    public function updatePaymentAdon(Request $request)
    {         
        $payment_adon = \App\PaymentAdons::find( $request->input("payment_adon_id")); 
        $created_at    = date("Y-m-d H:i:s");            
        $payment_adon->order_type_id  = $request->input('order_type_id');
        $payment_adon->title          = $request->input('title');        
        $payment_adon->price          = $request->input('price');
        $payment_adon->descp          = $request->input('description');
        $payment_adon->status         = 1;
        $payment_adon->create_at      = $created_at;
        $payment_adon->updated_at     = $created_at;
        $image  = $request->file('img_path'); 
        if($image)
        { 
            $image = $request->file('img_path');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/paymentadons');   
            $image_path ="uploads/paymentadons/".$name;     
            $payment_adon->img_path       = $image_path;
            $payment_adon->save();
            $image->move($destinationPath, $name);
            return Redirect::back()->withMessage('Payment Adnon Successfuly updated.');   
        } else {
            $payment_adon->img_path       =  $request->input('package_payment_image');;
            $payment_adon->save();
            return Redirect::back()->withMessage('Payment Adnon Successfuly updated.'); 
        }
    }
    
    //----------------------------delete payment adons-----------------------------
    public function destroy($payment_adon_id)
    {
       $payments_adons = \App\PaymentAdons::find($payment_adon_id);   
       $payments_adons->delete();     
       return Redirect::back()->withMessage('Payment Adnon Successfuly deleted.');  
    }
            
    
    
    
    
    
    
    
    
    
    
    
}
