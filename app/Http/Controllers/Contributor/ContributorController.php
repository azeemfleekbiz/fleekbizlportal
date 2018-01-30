<?php

namespace App\Http\Controllers\Contributor;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContributorController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {    
        $user_role = Auth::user()->user_role;
        if($user_role==3)
        { 
          $user_id = Auth::user()->id;
          $orders  = \App\LogoOrder::latest('id', 'asc')->where('user_id',$user_id)->count();
          return view('contributor.dashboard')->with(array('page_title'=>"Contributor Dashboard",'orders'=>$orders));
        }
        else
        {      
            Auth::logout();
            return redirect('login');
        }
    }
    
    public function profile()
    {
        $user_id = Auth::user();
        $user_role= DB::table('user_role')->where('name','contributor')->get();
        return view('contributor.user_profile')->with('page_title', "Contributor Profile")->with("user",$user_id)->with("user_role",$user_role);
    }
    
    //---------------------------update Profile----------------------------------------------
    public function updateProfile(Request $request)
    {
        $user = \App\User::find($request->input('user_id'));
        $user->user_role = $request->input('user_role');
        $user->f_name = $request->input('f_name');
        $user->l_name = $request->input('l_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->updated_at     = date("Y-m-d H:i:s");
        $user->save();
        return Redirect::back()->withMessage('User Detail Successfuly Updated.');
        
    }
    
    public function changePassword()
    {
        $user_role = Auth::user()->user_role;
        if($user_role==3)
        {
         return view('contributor.changepassword')->with('page_title', "Change Password");
        }else
        {      
            Auth::logout();
            return redirect('login');
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
        return redirect('login');
    }
    
    
    
    
}
