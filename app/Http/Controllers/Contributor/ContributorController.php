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
        return view('contributor.dashboard')->with('page_title', "Contributor Dashboard");
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
    
    
    
    
    
}
