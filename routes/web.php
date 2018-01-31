<?php 

Route::get('/', function () {
    return view('welcome');
});

//FRONTEND
Route::get('/', ['uses' => 'PagesController@homeVersion']);
Route::post('/create', ['uses' => 'PagesController@createOrders']);
Route::get('/payment', ['uses' => 'PagesController@payment']);
Route::post('/usecoupon', ['uses' => 'PagesController@orderuseCoupon']);
Route::get('/thanks', ['uses' => 'PagesController@thanks']);
Route::post('/userinfosave', ['uses' => 'PagesController@userInfoSave']);

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
    
    Route::get('orders/generate-pdf', 'Admin\Orders\PdfGenerateController@orderPdfGenerate')->name('orders-pdf');
    
    Route::get('orders/complete-orders-pdf', 'Admin\Orders\PdfGenerateController@completeOrderPdfGenerate')->name('complete-orders-pdf');
    
    Route::get('orders/pending-orders-pdf', 'Admin\Orders\PdfGenerateController@pendingOrderPdfGenerate')->name('pending-orders-pdf');
    
    Route::get('orders/paid-orders-pdf', 'Admin\Orders\PdfGenerateController@paidOrderPdfGenerate')->name('paid-orders-pdf');
    
    Route::get('orders/unpaid-orders-pdf', 'Admin\Orders\PdfGenerateController@unpaidOrderPdfGenerate')->name('unpaid-orders-pdf');
    
    Route::get('orders/generatepdf/{slug}', 'Admin\Orders\PdfGenerateController@generateOrderPdf');
    
    Route::get('/orders/order-detail/{slug}',  'Admin\Orders\OrdersController@viewOrder');  //get orders list
    
    Route::get('/orders/complete-orders',  'Admin\Orders\OrdersController@completOrders');  //get complete orders list
    
    Route::get('/orders/pending-orders',  'Admin\Orders\OrdersController@pendingOrders');  //get pending orders list
    
    Route::get('/orders/paid-orders',  'Admin\Orders\OrdersController@paidOrders');  //get paid orders list
    
    Route::get('/orders/unpaid-orders',  'Admin\Orders\OrdersController@unpaidOrders');  //get un paid orders list
    
    Route::get('orders/generate-pdf/{slug}', 'Admin\Orders\PdfGenerateController@pdfview')->name('generate-pdf');
    
    Route::get('/orders/create-order',  'Admin\Orders\OrdersController@create');  //create new order 
     
    Route::post('/orders/createorder',  'Admin\Orders\OrdersController@createOrder');  //create new order  
    
    Route::get('/invoices',  'Admin\Invoices\InvoicesController@index');  //get invoices list
    
    Route::get('/invoices/generate-invoice/{slug}',  'Admin\Invoices\InvoicesController@invoice');  //get invoices list
    
    Route::get('/invoices/print-invoice/{slug}',  'Admin\Invoices\InvoicesController@printinvoice');  //print invoice
    
    Route::get('/payments',  'Admin\Payments\PaymentController@index');  //get payments list     
    
    Route::get('/users',  'Admin\Users\UsersController@index');  //get payments list   
    
     Route::get('users/users-pdf', 'Admin\Users\UsersController@userPdfGenerate')->name('users-pdf');
    
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
    
    Route::get('/settings',  'Admin\Settings\SettingsController@index');    //settings list
    
    Route::post('/settings/create', 'Admin\Settings\SettingsController@create');  //add new Settings
    
    Route::post('/settings/update', 'Admin\Settings\SettingsController@update');  //update Setting 
   
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
    
    Route::post('/update-profile', 'Contributor\ContributorController@updateProfile');
    
    Route::get('/orders', 'Contributor\Orders\OrdersController@index');  //get orders list
    
    Route::get('/orders/edit-order/{slug}', 'Contributor\Orders\OrdersController@editOrder');  //get orders list
    
    Route::get('orders/generate-pdf', 'Contributor\Orders\PdfGenerateController@orderPdfGenerate')->name('orders-pdf');
    
    Route::get('orders/complete-orders-pdf', 'Contributor\Orders\PdfGenerateController@completeOrderPdfGenerate')->name('complete-orders-pdf');
    
    Route::get('orders/pending-orders-pdf', 'Contributor\Orders\PdfGenerateController@pendingOrderPdfGenerate')->name('pending-orders-pdf');
    
    Route::get('orders/paid-orders-pdf', 'Contributor\Orders\PdfGenerateController@paidOrderPdfGenerate')->name('paid-orders-pdf');
    
    Route::get('orders/unpaid-orders-pdf', 'Contributor\Orders\PdfGenerateController@unpaidOrderPdfGenerate')->name('unpaid-orders-pdf');
    
    Route::get('orders/generatepdf/{slug}', 'Contributor\Orders\PdfGenerateController@generateOrderPdf');
    
    Route::get('/orders/order-detail/{slug}',  'Contributor\Orders\OrdersController@viewOrder');  //get orders list
    
    Route::get('/orders/complete-orders',  'Contributor\Orders\OrdersController@completOrders');  //get complete orders list
    
    Route::get('/orders/pending-orders',  'Contributor\Orders\OrdersController@pendingOrders');  //get pending orders list
    
    Route::get('/orders/paid-orders',  'Contributor\Orders\OrdersController@paidOrders');  //get paid orders list
    
    Route::get('/orders/unpaid-orders',  'Contributor\Orders\OrdersController@unpaidOrders');  //edit order
    
    Route::post('/orders/update-order',  'Contributor\Orders\OrdersController@updateOrder');  //update order
    
    Route::get('/orders/create-order',  'Contributor\Orders\OrdersController@create');  //create new order 
    
    Route::post('/orders/createorder',  'Contributor\Orders\OrdersController@createOrder');  //create new order    
    
    Route::get('orders/generate-pdf/{slug}', 'Contributor\Orders\PdfGenerateController@pdfview')->name('generate-pdf');
    
    Route::get('/invoices',  'Contributor\Invoices\InvoicesController@index');  //get invoices list
    
    Route::get('/invoices/generate-invoice/{slug}',  'Contributor\Invoices\InvoicesController@invoice');  //get invoices list
    
    Route::get('/invoices/print-invoice/{slug}',  'Contributor\Invoices\InvoicesController@printinvoice');  //print invoice
    
    Route::get('/change-password', 'Contributor\ContributorController@changePassword');
    
    Route::post('/password-reset', 'Contributor\ContributorController@resetPassword');
});

Auth::routes();

Route::get('/home', 'Admin\AdminController@index');


Route::get('logout', 'Auth\LoginController@logout');
