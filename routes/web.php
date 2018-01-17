<?php 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', ['uses' => 'Admin\AdminController@index']);


Route::get('/admin/coupons', ['uses' => 'Admin\Coupons\CouponController@index']);  //get coupons list

Route::get('/admin/packages', ['uses' => 'Admin\Packages\PackagesController@index']);  //get packages list

Route::get('/admin/logotypes', ['uses' => 'Admin\LogoTypes\LogoTypeController@index']);  //get logotypes list

Route::get('/admin/logofeel', ['uses' => 'Admin\LogoFeel\LogoFeelController@index']);  //get logofeel list

Route::get('/admin/orders', ['uses' => 'Admin\Orders\OrdersController@index']);  //get orders list

Route::get('/admin/invoices', ['uses' => 'Admin\Invoices\InvoicesController@index']);  //get invoices list

Route::get('/admin/payments', ['uses' => 'Admin\Payments\PaymentController@index']);  //get payments list


