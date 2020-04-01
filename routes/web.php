<?php

//Front End routes
//Route::get('/{any}','Front\FrontController@index')->where(' any', '.*');  
Route::get('/', 'Front\FrontController@index')->name('home');
Route::get('/features-product', 'ProductController@getFeaturesProduct');
Route::get('/new-products', 'ProductController@newProduct');
Route::get('/inspire-products', 'ProductController@inspireProduct');
Route::get('/all-products', 'ProductController@allProduct');
Route::get('/all-category', 'ProductController@getAllcategory');
Route::get('/category-wise-product', 'ProductController@getCategoryProduct');
Route::get('/all-brands', 'ProductController@getAllBrands');
Route::get('/show-single-product/{id}', 'ProductController@singleProduct');

//Auth Routes
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
    });

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