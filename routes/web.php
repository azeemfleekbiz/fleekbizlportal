<?php 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'Admin\AdminController@index');

Route::get('/', ['uses' => 'PagesController@homeVersion']);
Route::post('/create', ['uses' => 'PagesController@create']);

Route::get('/admin', ['uses' => 'Admin\AdminController@index']);
Route::get('/admin/coupons', ['uses' => 'Admin\Coupons\CouponController@index']);  //get coupons list

Route::get('/admin/packages', ['uses' => 'Admin\Packages\PackagesController@index']);  //get packages list
Route::get('/admin/logotypes', ['uses' => 'Admin\LogoTypes\LogoTypeController@index']);  //get logotypes list

Route::post('/admin/coupons/save-coupon', ['uses' => 'Admin\Coupons\CouponController@saveCouponCode']);  //add new package

Route::post('/admin/coupons/update-coupon', ['uses' => 'Admin\Coupons\CouponController@updateCouponCode']);  // update package

Route::get('/admin/coupons/destroy/{slug}', ['uses' => 'Admin\Coupons\CouponController@destroy']);//delete package

Route::get('/admin/packages', ['uses' => 'Admin\Packages\PackagesController@index']);  //get packages list

Route::post('/admin/packages/save-package', ['uses' => 'Admin\Packages\PackagesController@savePackage']);  //add new package

Route::post('/admin/packages/update-package', ['uses' => 'Admin\Packages\PackagesController@updatePackage']);  // update package

Route::get('/admin/packages/destroy/{slug}', ['uses' => 'Admin\Packages\PackagesController@destroy']);//delete package

Route::get('/admin/payment-adons', ['uses' => 'Admin\PaymentAdons\PaymentAdonsController@index']);  //get logo fonts list

Route::post('/admin/payment-adons/save-payment-adon', ['uses' => 'Admin\PaymentAdons\PaymentAdonsController@savePaymentAdon']);  //add new logo fonts

Route::post('/admin/payment-adons/update-payment-adon', ['uses' => 'Admin\PaymentAdons\PaymentAdonsController@updatePaymentAdon']); //update logo fonts

Route::get('/admin/payment-adons/destroy/{slug}', ['uses' => 'Admin\PaymentAdons\PaymentAdonsController@destroy']);    //delete logo fonts

Route::get('/admin/logo-types', ['uses' => 'Admin\LogoTypes\LogoTypeController@index']);  //get logotypes list

Route::post('/admin/logotypes/save-logo', ['uses' => 'Admin\LogoTypes\LogoTypeController@saveLogoType']);  //add new logo

Route::post('/admin/logotypes/update-logo', ['uses' => 'Admin\LogoTypes\LogoTypeController@updateLogoType']);

Route::get('/admin/logotypes/destroy/{slug}', ['uses' => 'Admin\LogoTypes\LogoTypeController@destroy']);

Route::get('/admin/logofeel', ['uses' => 'Admin\LogoFeel\LogoFeelController@index']);  //get logofeel list

Route::get('/admin/orders', ['uses' => 'Admin\Orders\OrdersController@index']);  //get orders list

Route::get('/admin/invoices', ['uses' => 'Admin\Invoices\InvoicesController@index']);  //get invoices list

Route::get('/admin/payments', ['uses' => 'Admin\Payments\PaymentController@index']);  //get payments list


Route::get('/admin/users', ['uses' => 'Admin\Users\UsersController@index']);  //get payments list


Route::get('/admin/order-type', ['uses' => 'Admin\OrdersType\OrderTypeController@index']);  //get order types list

Route::post('/admin/order-type/save-Order-type', ['uses' => 'Admin\OrdersType\OrderTypeController@saveOrderType']);  //add new order

Route::post('/admin/order-type/update-Order-type', ['uses' => 'Admin\OrdersType\OrderTypeController@updateOrderType']);  //update order

Route::get('/admin/order-type/destroy/{slug}', ['uses' => 'Admin\OrdersType\OrderTypeController@destroy']);  //delete order

Route::get('/admin/logo-usage', ['uses' => 'Admin\LogoUsage\LogoUsageController@index']);  //get logo usage list

Route::post('/admin/logo-usage/save-logo-usage', ['uses' => 'Admin\LogoUsage\LogoUsageController@saveLogoUsage']);  //get logo usage list

Route::post('/admin/logo-usage/update-logo-usage', ['uses' => 'Admin\LogoUsage\LogoUsageController@updateLogoUsage']);  //get logo usage list

Route::get('/admin/logo-usage/destroy/{slug}', ['uses' => 'Admin\OrdersType\LogoUsageController@destroy']);  //delete order


Route::get('/admin/logo-fonts', ['uses' => 'Admin\LogoFonts\LogoFontsController@index']);  //get logo fonts list

Route::post('/admin/logo-fonts/save-logo-font', ['uses' => 'Admin\LogoFonts\LogoFontsController@saveLogoFont']);  //add new logo fonts

Route::post('/admin/logo-fonts/update-logo-font', ['uses' => 'Admin\LogoFonts\LogoFontsController@updateLogoFont']); //update logo fonts

Route::get('/admin/logo-fonts/destroy/{slug}', ['uses' => 'Admin\LogoFonts\LogoFontsController@destroy']);    //delete logo fonts
Auth::routes();

Route::get('/home', 'Admin\AdminController@index');
Route::get('/admin/dashboard', 'Admin\AdminController@index');

Route::get('logout', 'Auth\LoginController@logout');
