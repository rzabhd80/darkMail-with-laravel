<?php

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

Auth::routes();
Auth::routes(["verify"=>true]);
Route::get("/",[\App\Http\Controllers\HomeController::class,"index"]);
Route::get("/fuck",function (){
    dd(random_int(0,5));
});

Route::prefix("/emails")->middleware("auth")->group(function () {
    Route::get("/sentBox",[\App\Http\Controllers\EmailController::class,"sentBox"]);
    Route::get("/create",[\App\Http\Controllers\EmailController::class,"create"]);
    Route::post("/save",[\App\Http\Controllers\EmailController::class,"save"]);
    Route::put("/delete/{id}",[\App\Http\Controllers\EmailController::class,"delete"]);
    Route::put("/star/{id}",[\App\Http\Controllers\EmailController::class,"star"]);
    Route::get("/inbox",[\App\Http\Controllers\EmailController::class,"inbox"]);
    Route::get("/starBox",[\App\Http\Controllers\EmailController::class,"starredBox"]);
    Route::get("/deletedBox",[\App\Http\Controllers\EmailController::class,"deletedBox"]);
    Route::get("/{id}",[\App\Http\Controllers\EmailController::class,"detail"]);
});
