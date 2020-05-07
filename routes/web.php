<?php

//Front End routes
//Route::get('/{any}','Front\FrontController@index')->where(' any', '.*');  
//Route::get('/', 'Front\FrontController@index')->name('home');
Route::get('/', 'ProductController@index')->name('home');
Route::get('/features-product', 'ProductController@getFeaturesProduct');
Route::get('/new-products', 'ProductController@newProduct');
Route::get('/inspire-products', 'ProductController@inspireProduct');
Route::get('/all-products', 'ProductController@allProduct');
Route::get('/all-category', 'ProductController@getAllcategory');
Route::get('/all-brands', 'ProductController@getAllBrands');
Route::get('/show-single-product/{id}', 'ProductController@singleProduct');
Route::get('/category-wise-product/{id}', 'ProductController@getCategoryProduct');
Route::get('/brand-wise-product/{id}', 'ProductController@getBrandProduct');

Route::post('/add-to-cart/', 'CartController@addToCart');
Route::get('/show-cart/', 'CartController@showCart');
Route::get('/delete-cart/{id}','CartController@deleteCart');
Route::post('/update-cart/{rowId}','CartController@updateCart');


Route::get('/checkout/','CheckOutController@checkout')->name('checkout');

Route::post('/register-customer/','CustomerController@registerCustomer')->name('costomer.registration');
Route::post('/login-customer/','CustomerController@loginCustomer')->name('costomer.login');
Route::post('/logout-customer/','CustomerController@logoutCustomer')->name('logout-customer');
Route::get('/shipping/','CustomerController@shippingForm');
Route::post('/checkout-shipping/','CustomerController@checkoutShipping')->name('checkout-shipping');
Route::get('/payment/','CustomerController@paymentForm');
Route::post('/order-confirm/','CustomerController@confirmOrder')->name('confirm-order');

Route::get('/order-success/','CheckOutController@orderSuccess')->name('order-success');

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

//Auth Routes user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Super Admin Routes
Route::group(['as'=>'admin.','prefix'=>'dashboard','namespace'=>'Admin','middleware'=>['auth']], function () {
    Route::group(['middleware' => 'AdminMiddleware'], function() {
        
        Route::get('/category', 'CategoryController@index')->name('category.index');
        Route::post('/category', 'CategoryController@store')->name('category.store');
        Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('/category/update/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');

        Route::resource('user', 'UserController');
        Route::resource('brand', 'BrandController');
        Route::resource('coupon', 'CouponController');
        Route::get('order', 'OrderController@index')->name('all.orders');
        Route::get('order/details/{id}', 'OrderController@show')->name('order.show');
    });
//Vendor Admin Routes
    Route::group(['middleware' => 'VendorMiddleware'], function() {
        Route::resource('product', 'ProductsController');
    });
});
 


//General Controller Publish Unpublish
Route::group(['middleware' => ['auth', 'AdminMiddleware']], function() {
    Route::get('/category/unpublish/{id}', 'GeneralController@unpublish')->name('un-category');
    Route::get('/category/publish/{id}', 'GeneralController@publish')->name('pub-category');

    Route::get('/brand/unpublish/{id}', 'Admin\BrandController@unpublish')->name('un-brand');
    Route::get('/brand/publish/{id}', 'Admin\BrandController@publish')->name('pub-brand');

    Route::get('/product/unpublish/{id}', 'Admin\ProductsController@unpublish')->name('un-product');
    Route::get('/product/publish/{id}', 'Admin\ProductsController@publish')->name('pub-product');

    Route::get('/coupon/unpublish/{id}', 'Admin\CouponController@unpublish')->name('un-coupon');
    Route::get('/coupon/publish/{id}', 'Admin\CouponController@publish')->name('pub-coupon');

});


// Asides Composer
// category_count Composer
View::composer('backend.includes.aside', function ($view) {
    $category_count = App\Category:: where('cat_status', 1)->count();
    $view->with('category_count', $category_count);
});
// brand_count Composer
View::composer('backend.includes.aside', function ($view) {
    $brand_count = App\Brand::count();
    $view->with('brand_count', $brand_count);
}); 
// product_count Composer
View::composer('backend.includes.aside', function ($view) {
    $product_count = App\Product::count();
    $view->with('product_count', $product_count);
});

// coupon_count Composer
View::composer('backend.includes.aside', function ($view) {
    $coupon_count = App\Coupon::count();
    $view->with('coupon_count', $coupon_count);
});