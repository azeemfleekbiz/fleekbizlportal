<?php 

Route::get('/', function () {
    return view('welcome');
});

//FRONTEND
Route::get('/', ['uses' => 'PagesController@homeVersion']);
Route::post('/create', ['uses' => 'PagesController@createOrders']);


Route::get('/admin/dashboard', 'Admin\AdminController@index');

Route::prefix('admin')->group(function(){    
    Route::get('/login', 'Auth\AuthorController@showLoginForm')->name('admin.login');
    
    Route::post('/login', 'Auth\AuthorController@login')->name('admin.login.submit');    
    
    Route::get('/coupons',  'Admin\Coupons\CouponController@index');  //get coupons list
    
    Route::get('/packages', 'Admin\Packages\PackagesController@index');  //get packages list
    
    Route::get('/logotypes', 'Admin\LogoTypes\LogoTypeController@index');  //get logotypes list
    
    Route::post('/coupons/save-coupon', 'Admin\Coupons\CouponController@saveCouponCode');  //add new package
    
    Route::post('/coupons/update-coupon', 'Admin\Coupons\CouponController@updateCouponCode');  // update package
    
    Route::get('/coupons/destroy/{slug}', 'Admin\Coupons\CouponController@destroy');//delete package
    
    Route::get('/packages',  'Admin\Packages\PackagesController@index');  //get packages list
    
    Route::post('/packages/save-package',  'Admin\Packages\PackagesController@savePackage');  //add new package
    
    Route::post('/packages/update-package', 'Admin\Packages\PackagesController@updatePackage');  // update package
    
    Route::get('/packages/destroy/{slug}', 'Admin\Packages\PackagesController@destroy');//delete package
    
    Route::get('/payment-adons',  'Admin\PaymentAdons\PaymentAdonsController@index');  //get logo fonts list
    
    Route::post('/payment-adons/save-payment-adon', 'Admin\PaymentAdons\PaymentAdonsController@savePaymentAdon');  //add new logo fonts
    
    Route::post('/payment-adons/update-payment-adon',  'Admin\PaymentAdons\PaymentAdonsController@updatePaymentAdon'); //update logo fonts
    
    Route::get('/payment-adons/destroy/{slug}',  'Admin\PaymentAdons\PaymentAdonsController@destroy');    //delete logo fonts
    
    Route::get('/logo-types',  'Admin\LogoTypes\LogoTypeController@index');  //get logotypes list
    
    Route::post('/logotypes/save-logo',  'Admin\LogoTypes\LogoTypeController@saveLogoType');  //add new logo
    
    Route::post('/logotypes/update-logo',  'Admin\LogoTypes\LogoTypeController@updateLogoType');
    
    Route::get('/logotypes/destroy/{slug}', 'Admin\LogoTypes\LogoTypeController@destroy');
    
    Route::get('/logofeel',  'Admin\LogoFeel\LogoFeelController@index');  //get logofeel list
    
    Route::get('/orders',  'Admin\Orders\OrdersController@index');  //get orders list
    
    Route::get('/invoices',  'Admin\Invoices\InvoicesController@index');  //get invoices list
    
    Route::get('/payments',  'Admin\Payments\PaymentController@index');  //get payments list     
    
    Route::get('/users',  'Admin\Users\UsersController@index');  //get payments list   
    
    Route::get('/order-type',  'Admin\OrdersType\OrderTypeController@index');  //get order types list
    
    Route::post('/order-type/save-Order-type',  'Admin\OrdersType\OrderTypeController@saveOrderType');  //add new order
    
    Route::post('/order-type/update-Order-type',  'Admin\OrdersType\OrderTypeController@updateOrderType');  //update order
    
    Route::get('/order-type/destroy/{slug}',  'Admin\OrdersType\OrderTypeController@destroy');  //delete order
    
    Route::get('/logo-usage',  'Admin\LogoUsage\LogoUsageController@index');  //get logo usage list
    
    Route::post('/logo-usage/save-logo-usage', 'Admin\LogoUsage\LogoUsageController@saveLogoUsage');  //get logo usage list
    
    Route::post('/logo-usage/update-logo-usage',  'Admin\LogoUsage\LogoUsageController@updateLogoUsage');  //get logo usage list
    
    Route::get('/logo-usage/destroy/{slug}', 'Admin\OrdersType\LogoUsageController@destroy');  //delete order
    
    Route::get('/logo-fonts',  'Admin\LogoFonts\LogoFontsController@index');  //get logo fonts list
    
    Route::post('/logo-fonts/save-logo-font', 'Admin\LogoFonts\LogoFontsController@saveLogoFont');  //add new logo fonts
    
    Route::post('/logo-fonts/update-logo-font',  'Admin\LogoFonts\LogoFontsController@updateLogoFont'); //update logo fonts
    
    Route::get('/logo-fonts/destroy/{slug}',  'Admin\LogoFonts\LogoFontsController@destroy');    //delete logo fonts
    
    Route::get('/change-password', 'Admin\AdminController@changePassword');
    
    Route::post('/password-reset', 'Admin\AdminController@resetPassword');
    
    Route::get('/', 'Admin\AdminController@index');    
});


Route::get('/contributor/dashboard', 'Contributor\ContributorController@index');

Route::prefix('contributor')->group(function(){    
    
    Route::get('/', 'Contributor\ContributorController@index');  
    Route::get('/login', 'Auth\ContributorAdminController@showLoginForm')->name('contributor.login');
    Route::post('/login', 'Auth\ContributorAdminController@login')->name('contributor.login.submit');
    Route::get('/profile', 'Contributor\ContributorController@profile');
});



Route::get('/', ['uses' => 'PagesController@homeVersion']);
Route::post('/create', ['uses' => 'PagesController@create']);


Auth::routes();

Route::get('/home', 'Admin\AdminController@index');


Route::get('logout', 'Auth\LoginController@logout');
