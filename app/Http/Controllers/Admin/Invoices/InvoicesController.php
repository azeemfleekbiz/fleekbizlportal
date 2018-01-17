<?php

namespace App\Http\Controllers\Admin\Invoices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{   
    //-----------------------get all invoices list
    public function index()
    {
        return view('admin.invoices.index')->with('page_title', "Admin Dashboard Invoices");
    }
}
