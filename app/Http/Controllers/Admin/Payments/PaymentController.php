<?php

namespace App\Http\Controllers\Admin\Payments;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
   //-----------------------get all payments list
    public function index()
    {
        return view('admin.payments.index')->with('page_title', "Admin Dashboard Payments");
    }
}
