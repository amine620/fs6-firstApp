<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

});



Route::get('/users',[UserController::class,"getUsers"]);



Route::get('details/{id}',[BlogController::class,'details']);

Route::get('home',[BlogController::class,'home']);
Route::get('about',[BlogController::class,'about']);
Route::get('contact',[BlogController::class,'contact']);