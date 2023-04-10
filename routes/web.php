<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/',[FrontendController::class,'index']);

//Tranding Category & Product
Route::get('/category/product/{slug}',[FrontendController::class,'showcategory']);
Route::get('/category/{category_slug}/{product_name}',[FrontendController::class,'showsingleproduct']);

// Cart Route
Route::post('/add-to-cart',[CartController::class,'store']);
Route::get('/cart',[CartController::class,'viewcart']);
Route::post('/delete-to-cart',[CartController::class,'destroy']);
Route::post('/updatecart',[CartController::class,'update']);

//Check Out
Route::get('/checkout',[CheckoutController::class,'index']);
Route::post('/checkout/order',[CheckoutController::class,'placeorder'])->name('checkout.order');


//Wishlist Route
Route::post('/add-to-wishlist',[WishlistController::class,'add']);
Route::post('/delete-to-wishlist',[WishlistController::class,'destroy']);

//Product Search
Route::get('/productlist',[FrontendController::class,'productlistajax']);
Route::post('/searchproduct',[FrontendController::class,'searchproduct']);

//Wishlist & Userdashboad Route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/wishlist',[WishlistController::class,'index']);
    Route::post('/processtopay',[CheckoutController::class,'rzorpay']);
    Route::get('/userdashboad',[UserController::class,'index'])->name('user.dash');
    Route::get('/vieworder/{id}',[UserController::class,'viewuserorder']);
 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'userhome'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
       return view('admin.dashboard');
    });
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::post('/category/insert',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/show',[CategoryController::class,'view'])->name('category.view');

    //Product panel
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::post('/product/insert',[ProductController::class,'store'])->name('product.store');

    //Order Controller
    Route::get('/userorder',[OrderController::class,'index']);
    Route::get('/admin/vieworder/{id}',[OrderController::class,'vieworder']);
    Route::post('updateorder/{id}',[OrderController::class,'updateuserorder']);
    Route::get('/orderhistory',[OrderController::class,'vieworderhistory']);
 });
//Settings
 Route::get('/maintance',[SettingsController::class,'index'])->name('maintaince');
 Route::get('/maintance/up',[SettingsController::class,'maintance'])->name('maintaince.up');
 Route::get('/mail/view',[SettingsController::class,'mailview'])->name('mail');
 Route::put('/mail-update/{mailsetting}',[SettingsController::class,'update'])->name('mail.update');

//  Route::get('/test-mail',function(){

//     $message = "Testing mail";

//     \Mail::raw('Hi, welcome!', function ($message) {
//       $message->to('ajayydavex@gmail.com')
//         ->subject('Testing mail');
//     });

//     dd('sent');

// });


// $routeMainName = config('env-editor.route.name');

// Route::prefix(config('env-editor.route.prefix'))
//     ->middleware(config('env-editor.route.middleware'))
//     ->group(function () use ($routeMainName) {
//         Route::get('/', [EnvController::class, 'index'])->name($routeMainName.'.index');

//         Route::post('key', [EnvController::class, 'addKey'])->name($routeMainName.'.key');
//         Route::patch('key', [EnvController::class, 'editKey']);
//         Route::delete('key', [EnvController::class, 'deleteKey']);

//         Route::delete('clear-cache', [EnvController::class, 'clearConfigCache'])->name($routeMainName.'.clearConfigCache');

//         Route::prefix('files')->group(function () use ($routeMainName) {
//             Route::get('/', [EnvController::class, 'getBackupFiles'])
//                 ->name($routeMainName.'.getBackups');
//             Route::post('create-backup', [EnvController::class, 'createBackup'])
//                 ->name($routeMainName.'.createBackup');
//             Route::post('restore-backup/{filename?}', [EnvController::class, 'restoreBackup'])
//                 ->name($routeMainName.'.restoreBackup');
//             Route::delete('destroy-backup/{filename?}', [EnvController::class, 'destroyBackup'])
//                 ->name($routeMainName.'.destroyBackup');

//             Route::get('download/{filename?}', [EnvController::class, 'download'])
//                 ->name($routeMainName.'.download');
//             Route::post('upload', [EnvController::class, 'upload'])
//                 ->name($routeMainName.'.upload');
//         });
//     });




