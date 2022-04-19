<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/category/product/{slug}',[FrontendController::class,'showcategory']);
Route::get('/category/{category_slug}/{product_name}',[FrontendController::class,'showsingleproduct']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
 });
