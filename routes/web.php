<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
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

/**
 * a route to welcome page:
 * '/' => welcome.blade.php
 */
Route::get('/', function () {
    return view('welcome');
})->name('home');

/**
 * a route to about page:
 * '/aboutus' => about.blade.php
 */
Route::get('/aboutus' , function(){
    return view('about');
})->name('about');


/**
 * a route to welcome page:
 * '/contactus' => contact.blade.php
 */
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

    /**
     * make new product route
     */
    Route::post('/addNewProduct' , 'store')->name('add');

    /**
     * remove an existing product
     */
    Route::post('/removeProduct' , 'delProduct')->name('remove');
    /**
     * get all products
     */
    Route::get('/getProducts' , 'getProducts')->name('getProducts');

    /**
     * '/discover' => discover.blade.php (with pagination)
     */
    Route::get('/discover' , 'discover')->name('discover');

    /**
     * publish an waiting product to be public
     */
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

//messages routes

Route::controller(MessageController::class)->middleware('auth')->group(function(){
    /**
     * route to handle the send message action
     */
    Route::post('/sendMessage' , 'send')->name('send');

    /**
     * get the messenger page 
     * '/messenger' => messenger.blade.php
     */
    Route::get('/messenger' , 'index');
    /**
     * route to handle the delete action
     */
    Route::post('deleteMessage')->name('delete');
});

