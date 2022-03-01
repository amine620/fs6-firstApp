<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
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




Route::delete('destroy/{id}',[BlogController::class,'destroy']);

Route::get('details/{id}',[BlogController::class,'details']);
Route::get('home',[BlogController::class,'home']);
Route::get('about',[BlogController::class,'about']);
Route::get('contact',[BlogController::class,'contact']);



Route::get('create',[BlogController::class,'create']);
Route::post('store',[BlogController::class,'store']);

Route::get('show/{id}',[BlogController::class,'show']);
Route::put('/update/{id}',[BlogController::class,'update']);


Route::get('getData',[BlogController::class,'getData']);