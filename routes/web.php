<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
})->name('home');

Route::get('/aboutus' , function(){
    return view('about');
})->name('about');

Route::get('/contactus' , function(){
    return view('contact');
})->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//define routes tha will be passed automatically to productController
Route::controller(ProductController::class)->group(function(){

    //add new product
    Route::post('/addNewProduct' , 'store')->name('add');

    Route::post('/removeProduct' , 'delProduct')->name('remove');

    Route::get('/getProducts' , 'getProducts')->name('getProducts');

    Route::get('/discover' , 'discover')->name('discover');

    Route::post('/publish' , 'check')->name('check');

});


Route::controller(OrderController::class)->group(function(){
    Route::get('/makeorder' , 'makeOrder')->name('makeorder')->middleware('auth');
    Route::post('/newORder' , 'newOrdre')->name('newOrder');
    Route::post('addtoorder' , 'addToOrder')->name('addToOrder');
});


Route::middleware('auth')->controller(Controller::class)->group(function(){
    Route::get('/messenger' , 'messenger');
    Route::get('getEvent' , 'fire')->name('fire');
});