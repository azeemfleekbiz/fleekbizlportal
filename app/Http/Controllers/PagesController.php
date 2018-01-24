<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    public function homeVersion()
    {
    	$home = 'home';
    	return view('pages.'.$home);
    }

    public function createOrders(Request $request)
    {
      $user_role = $request->input("user_role");
      $order_type = $request->input("order_type");
      $fname = $request->input("fname");
      $lname = $request->input("lname");
      $email = $request->input("email");
      $phone = $request->input("phone");
      $logo_name = $request->input("logo_name");
      $logo_category = $request->input("logo_category");
      $target_audience = $request->input("target_audience");
      $compititor_url = $request->input("compititor_url");
      $slogan = $request->input("slogan");
      $website_url = $request->input("website_url");
      $descrp = $request->input("descrp");
      $describe_imgs_like = $request->input("describe_imgs_like");
      $describe_imgs_dont_like = $request->input("describe_imgs_dont_like");
      $uploadfiles_name = $request->input("uploadfiles_name");
      $remove_file_arr = explode(",",$uploadfiles_name);
      $logo_type = $request->input("logo_type");
      $logo_type_arr = implode(",",$logo_type);
      $choose_color = $request->input("choose_color");
      $other_color = $request->input("other_color");
      $logo_usage = $request->input("logo_usage");
      $other_logo_usage = $request->input("other_logo_usage");
      $font_type = $request->input("font_type");
      $other_font_type = $request->input("other_font_type");
      $logo_feel = $request->input("logo_feel");
      $logo_feel_arr = implode(",",$logo_feel);
      $communicate_designers = $request->input("communicate_designers");
      $deigner_help_files_name = $request->input("deigner_help_files_name");
      $remove_deigner_help_files_arr = explode(",",$deigner_help_files_name);
      $package_name = $request->input("package_name");
      $package_amount = $request->input("package_amount");
      $addon_name = $request->input("addon_name");
      $addon_amount = $request->input("addon_amount");



      if ( Input::hasFile('sample_logos') ):
            $file = Input::file();
           for ($j=0; $j < count($file['sample_logos']); $j++) { 
              $sample_images_name_arr[] = $file['sample_logos'][$j]->getClientOriginalName();
            } 
           if(count($remove_file_arr) > 0){
              for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   if(in_array($sample_images_name_arr[$i], $remove_file_arr)){
                      //echo 'Delete Files '.$sample_images_name.'<br>';
                   }else{
                      $destinationPath = $file['sample_logos'][$i];  
                      $image_path ="public/uploads/order_logo/".$sample_images_name;  
                      move_uploaded_file($destinationPath, $image_path); 
                      $sample_images_arr[] = $sample_images_name;
                   }
              }
           }else{
               for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   $destinationPath = $file['sample_logos'][$i];  
                   $image_path ="public/uploads/order_logo/".$sample_images_name;  
                   move_uploaded_file($destinationPath, $image_path); 
                   $sample_images_arr[] = $sample_images_name;
               }
           }
      endif;

      if ( Input::hasFile('deigner_help_imgs') ):
            $help_file = Input::file();
           for ($j=0; $j < count($help_file['deigner_help_imgs']); $j++) { 
              $deigner_help_imgs_arr[] = $help_file['deigner_help_imgs'][$j]->getClientOriginalName();
            } 
           if(count($remove_deigner_help_files_arr) > 0){
              for ($i=0; $i < count($help_file['deigner_help_imgs']) ; $i++) {
                   $deigner_help_name = $help_file['deigner_help_imgs'][$i]->getClientOriginalName();
                   if(in_array($deigner_help_imgs_arr[$i], $remove_deigner_help_files_arr)){
                   }else{
                      $destinationPath_help_imgs = $help_file['deigner_help_imgs'][$i];  
                      $deigner_help_image_path ="public/uploads/order_logo/".$deigner_help_name;  
                      move_uploaded_file($destinationPath_help_imgs, $deigner_help_image_path); 
                      $designer_help_images_arr[] = $deigner_help_name;
                   }
              }
           }else{
               for ($i=0; $i < count($help_file['deigner_help_imgs']) ; $i++) {
                   $deigner_help_name = $help_file['deigner_help_imgs'][$i]->getClientOriginalName();
                   $destinationPath_help_imgs = $help_file['deigner_help_imgs'][$i];  
                   $deigner_help_image_path ="public/uploads/order_logo/".$deigner_help_name;  
                   move_uploaded_file($destinationPath_help_imgs, $deigner_help_image_path); 
                   $designer_help_images_arr[] = $deigner_help_name;
               }
           }
      endif;

      $created_at    = date("Y-m-d H:i:s");
      $pass = 'test';
      if (User::where('email', '=', Input::get('email'))->count() > 0) {
          $userData = User::where('email', $email)->first();
          $userId = $userData->id;
      }else{
          $userId = DB::table('users')->insertGetId(
                    ['f_name' => $fname,'l_name' => $lname,'email' => $email,'password' => $pass,'phone' => $phone,'user_role' => $user_role, 'created_at' => $created_at, 'updated_at' => $created_at] );
      }
      
      $orderId = DB::table('logo_orders')->insertGetId(
                    ['user_id' => $userId,'order_type' => $order_type,'logo_name' => $logo_name,'logo_slogan' => $slogan,'logo_cat' => $logo_category,'logo_web_url' => $website_url,'logo_target_audience' => $target_audience,'logo_descrip' => $descrp,'logo_competitor_url' => $compititor_url,'logo_sample' => implode(",",$sample_images_arr),'logo_visual_descp' => $describe_imgs_dont_like,'logo_visual_images' => $describe_imgs_like,'logo_type' => $logo_type_arr,'logo_color' => $choose_color,'logo_other_color' => $other_color,'logo_usage' => $logo_usage,'logo_other_usage' => $other_logo_usage,'logo_fonts' => $font_type,'logo_other_fonts' => $other_font_type,'logo_feel' => $logo_feel_arr,'communication_team' => $communicate_designers,'helpful_images' => implode(",",$designer_help_images_arr), 'create_at' => $created_at, 'updated_at' => $created_at] );

      // $order_paymentId = DB::table('orders_payments')->insertGetId(
      //               ['order_id' => $orderId,'user_id' => $userId,'order_type' => $order_type,'package_id' => $slogan,'coupon_id' => $logo_category,'amount' => $website_url,'discount_amount' => $target_audience,'total_amount' => $descrp,'create_at' => $created_at, 'updated_at' => $created_at] );


      echo 'Last Id '.$userId.'<br>';
      echo 'Order Type '.$order_type.'<br>';
      echo 'Order Id '.$orderId.'<br>';
      echo 'Order Payment Id '.$order_paymentId.'<br>';
      echo 'Name F '.$fname.'<br>';
      echo 'L Name '.$lname.'<br>';
      echo 'Email '.$email.'<br>';
      echo 'Phone '.$phone.'<br>';
      echo 'Logo Name '.$logo_name.'<br>';
      echo 'Logo Cate '.$logo_category.'<br>';
      echo 'Target '.$target_audience.'<br>';
      echo 'Compititor '.$compititor_url.'<br>';
      echo 'web url '.$website_url.'<br>';
      echo 'Descp '.$descrp.'<br>';
      echo 'Sample Logo '.implode(",",$sample_images_arr).'<br>';
      echo 'Image Like '.$describe_imgs_like.'<br>';
      echo 'Image dont like '.$describe_imgs_dont_like.'<br>';
      echo 'Logo Type'.$logo_type_arr.'<br>';
      echo 'Choose Color '.$choose_color.'<br>';
      echo 'Other Color'.$other_color.'<br>';
      echo 'Logo usage'.$logo_usage.'<br>';
      echo 'Other usage'.$other_logo_usage.'<br>';
      echo 'Font Type'.$font_type.'<br>';
      echo 'Other Font'.$other_font_type.'<br>';
      echo 'Logo Feel'.$logo_feel_arr.'<br>';
      echo 'Communicate to our logo design team '.$communicate_designers.'<br>';
      echo 'Designer Help Images '.implode(",",$designer_help_images_arr).'<br>';
      echo 'Package Name '.$package_name.'<br>';
      echo 'Package Amount '.$package_amount.'<br>';
      echo 'Addon Name '.$addon_name.'<br>';
      echo 'Addon Amount '.$addon_amount.'<br>';
       exit;
    }
}
