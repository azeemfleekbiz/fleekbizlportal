<?php

namespace App\Http\Controllers\Admin\Invoices;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    //-----------------------get all invoices list
    public function index()
    {
        return view('admin.invoices.index')->with('page_title', "Admin Dashboard Invoices");
    }
}
