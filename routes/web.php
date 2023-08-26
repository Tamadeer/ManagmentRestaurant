<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'order'], function(){
    Route::get('/',[\App\Http\Controllers\OrderController::class,'index'])->name('order.index');
    Route::post('/store',[\App\Http\Controllers\OrderController::class,'store'])->name('order.store');
    Route::put('/update',[\App\Http\Controllers\OrderController::class,'update'])->name('order.update');
    Route::delete('/destroy',[\App\Http\Controllers\OrderController::class,'destroy'])->name('order.destroy');
    Route::get('/create',[\App\Http\Controllers\OrderController::class,'create'])->name('order.create');
    Route::get('/repeater',[\App\Http\Controllers\OrderController::class,'index2']);
//    Route::resource('order',OrderController::class);
    Route::get('/indexshow',[\App\Http\Controllers\OrderController::class,'indexshow']);
});
Route::get('/order/show/{id}',[\App\Http\Controllers\OrderController::class,'show'])->name('order.show');
Route::get('/order/show1/{id}',[\App\Http\Controllers\OrderController::class,'show1'])->name('order.show1');
Route::get('/order/show_price/{name}',[\App\Http\Controllers\OrderController::class,'show_price'])->name('order.show_price');
Route::get('/lending',[\App\Http\Controllers\HomeController::class,'lending'])->name('order.lending');
Route::get('/order',[\App\Http\Controllers\OrderController::class,'index1']);
Route::post('/form/submit',[OrderController::class,'submit'])->name('form.submit');
//Route::resource('order',OrderController::class);

Route::resource('restaurants',\App\Http\Controllers\RestaurantController::class);
Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('addresses',\App\Http\Controllers\AddressController::class);


Route::group(['prefix'=>'coupons'], function(){
    Route::get('/',[\App\Http\Controllers\CouponsController::class,'index'])->name('coupons.index');
    Route::post('/store',[\App\Http\Controllers\CouponsController::class,'store'])->name('coupons.store');
    Route::put('/update',[\App\Http\Controllers\CouponsController::class,'update'])->name('coupons.update');
    Route::delete('/destroy',[\App\Http\Controllers\CouponsController::class,'destroy'])->name('coupons.destroy');
});

Route::group(['prefix'=>'bill'], function(){
    Route::get('/',[\App\Http\Controllers\BillController::class,'index'])->name('bill.index');
    Route::post('/store',[\App\Http\Controllers\BillController::class,'store'])->name('bill.store');
    Route::put('/update',[\App\Http\Controllers\BillController::class,'update'])->name('bill.update');
    Route::delete('/destroy',[\App\Http\Controllers\BillController::class,'destroy'])->name('bill.destroy');
});


Route::group(['prefix'=>'table'], function(){
    Route::get('/',[\App\Http\Controllers\TableController::class,'index'])->name('table.index');
    Route::post('/store',[\App\Http\Controllers\TableController::class,'store'])->name('table.store');
    Route::put('/update',[\App\Http\Controllers\TableController::class,'update'])->name('table.update');
    Route::delete('/destroy',[\App\Http\Controllers\TableController::class,'destroy'])->name('table.destroy');

});
Route::group(['prefix'=>'meal'], function(){
    Route::get('/',[\App\Http\Controllers\MealController::class,'index'])->name('meal.index');
    Route::post('/store',[\App\Http\Controllers\MealController::class,'store'])->name('meal.store');
    Route::put('/update',[\App\Http\Controllers\MealController::class,'update'])->name('meal.update');
    Route::delete('/destroy',[\App\Http\Controllers\MealController::class,'destroy'])->name('meal.destroy');
    Route::get('/show',[\App\Http\Controllers\MealController::class,'show'])->name('meal.show');
    Route::post('/storephoto',[\App\Http\Controllers\MealController::class,'show'])->name('storephoto');
});
Route::get('/order/{id}',[OrderController::class,'getproducts']);

Route::get('/{page}',[AdminController::class,'index']);

