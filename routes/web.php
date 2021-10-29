<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

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
Route::middleware(["auth"])->group(function (){
    Route::get('/',[WebController::class,'index']);
    Route::get('{user_name}/posts',[WebController::class,'post']);
    Route::post('{user_name}/posts/create',[WebController::class,'create_post']);
    Route::get('{user_name}/products',[WebController::class,'product']);
    Route::get('{user_name}/students',[WebController::class,'student']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
