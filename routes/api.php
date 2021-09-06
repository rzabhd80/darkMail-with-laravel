<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/users",function (Request $request) {
    return response()->json(\App\Models\User::all());
});

Route::get("/emails",function () {
   return response()->json(\App\Models\Email::all());
});

Route::get("/users/{id}",function ($id){
    $user = \App\Models\User::find($id);
    return response()->json($user);
});

Route::get("/emails/{id}",function ($id) {
   $email =  \App\Models\Email::find($id);
   return response()->json($email);
});

