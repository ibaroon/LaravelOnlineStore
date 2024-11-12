<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Middleware\IsAdminMiddeleWare;


Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    [   'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] // middleware use to save last user language settings
    ],function(){ 
        
        
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::group([  'middleware'=>['is_admin','auth'],'prefix'=>'admin'], function () {

        Route::get('/dashboard',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('dashboard');

        Route::get('cats/imgDestroy/{cat}',[\App\Http\Controllers\Admin\CategoryController::class,'imgDestroy'])->name('cats.imgDestroy');
        Route::resource('/cats', \App\Http\Controllers\Admin\CategoryController::class);
        
        Route::get('products/imgDestroy/{product}',[\App\Http\Controllers\Admin\ProductController::class,'imgDestroy'])->name('products.imgDestroy');
        Route::resource('/products', \App\Http\Controllers\Admin\ProductController::class);
        
        Route::get('users/change_type/{user}', [\App\Http\Controllers\Admin\UsesController::class,'change_type'])->name('users.change_type');
        Route::resource('/users', \App\Http\Controllers\Admin\UsesController::class);

        Route::get('/orders', [\App\Http\Controllers\Admin\orderController::class,'index'])->name('orders.index');
        Route::get('/orders/{OrderId}', [\App\Http\Controllers\Admin\orderController::class,'changeStatus'])->name('orders.changeStatus');
   
});

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('user.profile.store');
       
    // Route::get('/', function () { return view('welcome');
    //      });
   
Route::get('/',[App\Http\Controllers\WebSiteController::class,'index'])->name('website');
Route::get('/products',[App\Http\Controllers\WebSiteController::class,'getProducts'])->name('getProducts');
Route::get('/cats',[App\Http\Controllers\WebSiteController::class,'getCates'])->name('getCates');
Route::get('/cat/{slug}',[App\Http\Controllers\WebSiteController::class,'getCateBySlug'])->name('getCatSlug');
Route::get('/cat/{cat_slug}/{product_slug}',[App\Http\Controllers\WebSiteController::class,'getProductBySlug'])->name('getProductSlug');

Route::post('/product/add_to_cart',[App\Http\Controllers\AddToCartController::class,'addToCart'])->name('product.addToCart');

Route::group(['middleware'=>['auth'] ],function(){

Route::get('cart',[App\Http\Controllers\AddToCartController::class,'index'])->name('cart.index');
Route::delete('cart/destroy/{cart}',[App\Http\Controllers\AddToCartController::class,'destroy'])->name('cart.destroy');
Route::post('cart/update',[App\Http\Controllers\AddToCartController::class,'update'])->name('cart.update');

Route::get('checkout',[App\Http\Controllers\CheckOutController::class,'index'])->name('checkout.index');

Route::post('checkout',[App\Http\Controllers\CheckOutController::class,'proceed'])->name('checkout.proceed');
Route::get('payment',[App\Http\Controllers\CheckOutController::class,'index'])->name('payment.payment');
Route::get('order',[App\Http\Controllers\CheckOutController::class,'orders'])->name('order.index');

    });

});
//   Route::get('/', function () {
//          return view('welcome');
//      });

  // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    
    // Route::get('/cats', function () {
    //     return view('admin.caregories');
    // });










