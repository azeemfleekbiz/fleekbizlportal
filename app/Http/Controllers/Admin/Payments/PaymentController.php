<?php

namespace App\Http\Controllers\Admin\Payments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
   //-----------------------get all payments list
    public function index()
    {
        return view('admin.payments.index')->with('page_title', "Admin Dashboard Payments");
    }
}
