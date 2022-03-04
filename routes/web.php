<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
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

    return view('welcome');

});









Route::get('home',[BlogController::class,'home']);
Route::get('details/{id}',[BlogController::class,'details']);

Route::group(['middleware'=>'auth'],function(){

    Route::get('show/{id}',[BlogController::class,'show']);
    Route::post('store',[BlogController::class,'store']);
    Route::put('/update/{id}',[BlogController::class,'updateBlog']);
    Route::delete('destroy/{id}',[BlogController::class,'destroy']);
    Route::get('create',[BlogController::class,'create']);
    Route::get('getData',[BlogController::class,'getData']);

    // soft delete routes
    Route::get('trash',[BlogController::class,'trashed_blog']);
    Route::get('all',[BlogController::class,'all']);
    Route::get('restore/{id}',[BlogController::class,'restore']);



});




Auth::routes();



