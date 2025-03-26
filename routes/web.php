<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix' => ''], function(){
    // Route::get('/', function(){
    //     return view('welcome');
    // });
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    // Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
    // Route::get('/shop/{id}', [HomeController::class, 'detail'])->name('home.detail');
});
Route::group(['prefix' => 'shop'], function(){
    
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('product/{product}', [ShopController::class, 'product'])->name('shop.product');
    Route::get('/productsByCategory/{category_id}', [ShopController::class, 'productsByCategory'])->name('shop.productsByCategory');
});
Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/account/login', [AccountController::class, 'check_login']);

Route::get('/account/register', [AccountController::class, 'register'])->name('account.register');
Route::post('/account/register', [AccountController::class, 'check_register']);
Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    // Route::get('/', function(){
    //     return view('admin.index');
    // });
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class
    ]);
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function(){
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::put('/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/', [CartController::class, 'p_checkout']);
    Route::get('/verify/{token}', [CartController::class, 'verify'])->name('order.verify');
    Route::get('/success', [CartController::class, 'success'])->name('order.success');
    Route::get('/success_verify', [CartController::class, 'success_verify'])->name('order.success_verify');
});

// Route::group(['prefix' => 'order', 'middleware' => 'auth'], function(){
//     Route::get('/checkout', [CheckoutController::class, 'checout'])->name('order.checout');
//     Route::post('/checkout', [CheckoutController::class, 'p_checkout']);

// });