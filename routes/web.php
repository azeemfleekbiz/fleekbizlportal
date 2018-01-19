<?php 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', ['uses' => 'Admin\AdminController@index']);


Route::get('/admin/coupons', ['uses' => 'Admin\Coupons\CouponController@index']);  //get coupons list

Route::get('/admin/packages', ['uses' => 'Admin\Packages\PackagesController@index']);  //get packages list

Route::post('/admin/packages/save-package', ['uses' => 'Admin\Packages\PackagesController@savePackage']);  //add new package

Route::post('/admin/packages/update-package', ['uses' => 'Admin\Packages\PackagesController@updatePackage']);  // update package

Route::get('/admin/packages/destroy/{slug}', ['uses' => 'Admin\Packages\PackagesController@destroy']);//delete package

Route::get('/admin/logotypes', ['uses' => 'Admin\LogoTypes\LogoTypeController@index']);  //get logotypes list

Route::get('/admin/logofeel', ['uses' => 'Admin\LogoFeel\LogoFeelController@index']);  //get logofeel list

Route::get('/admin/orders', ['uses' => 'Admin\Orders\OrdersController@index']);  //get orders list

Route::get('/admin/invoices', ['uses' => 'Admin\Invoices\InvoicesController@index']);  //get invoices list

Route::get('/admin/payments', ['uses' => 'Admin\Payments\PaymentController@index']);  //get payments list

Route::get('/admin/order-type', ['uses' => 'Admin\OrdersType\OrderTypeController@index']);  //get order types list

Route::post('/admin/order-type/save-Order-type', ['uses' => 'Admin\OrdersType\OrderTypeController@saveOrderType']);  //add new order

Route::post('/admin/order-type/update-Order-type', ['uses' => 'Admin\OrdersType\OrderTypeController@updateOrderType']);  //update order

Route::get('/admin/order-type/destroy/{slug}', ['uses' => 'Admin\OrdersType\OrderTypeController@destroy']);  //delete order



