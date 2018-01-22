<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function homeVersion()
    {
    	$home = 'home';
    	return view('pages.'.$home);
    }

    //Form for adding a new order in our database table.
    public function create(Request $request){
    	$fname = $request->input('fname');

    	print_r($fname) ;
    	die();

    }
}
