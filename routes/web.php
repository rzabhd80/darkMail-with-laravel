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
\App\Http\Middleware\LoginCheck::class;
Auth::routes();
Route::get("/", [\App\Http\Controllers\HomeController::class, "index"]);
Route::get("/home", [\App\Http\Controllers\HomeController::class, "index"]);

Route::prefix("/emails")->middleware("loginCheck")->group(function () {
    Route::get("/sentBox", [\App\Http\Controllers\EmailController::class, "sentBox"]);
    Route::get("/draftBox",[\App\Http\Controllers\EmailController::class,"draftBox"]);
    Route::get("/create", [\App\Http\Controllers\EmailController::class, "create"]);
    Route::get("/respond/{id}",[\App\Http\Controllers\EmailController::class,"respond"]);
    Route::post("/save", [\App\Http\Controllers\EmailController::class, "save"]);
    Route::post("/draft",[\App\Http\Controllers\EmailController::class,"saveDraft"]);
    Route::put("/delete/{id}", [\App\Http\Controllers\EmailController::class, "delete"]);
    Route::put("/star/{id}", [\App\Http\Controllers\EmailController::class, "star"]);
    Route::get("/inbox", [\App\Http\Controllers\EmailController::class, "inbox"]);
    Route::get("/starBox", [\App\Http\Controllers\EmailController::class, "starredBox"]);
    Route::get("/deletedBox", [\App\Http\Controllers\EmailController::class, "deletedBox"]);
    Route::get("/{id}", [\App\Http\Controllers\EmailController::class, "detail"]);
});

Route::prefix("/users")->middleware('loginCheck')->group(function () {
    Route::get("/info", [\App\Http\Controllers\UserController::class, "accInfo"]);
    Route::put("/editProfile", [\App\Http\Controllers\UserController::class, "editProfile"]);
    Route::get("/uploadProfile", [\App\Http\Controllers\UserController::class, "uploadProfile"]);
    Route::put("/editProfile", [\App\Http\Controllers\UserController::class, "editProfile"]);
    Route::get("/draftBox", [\App\Http\Controllers\EmailController::class, "draftBox"]);
});

Route::prefix("/admins")->group(function () {
    Route::get("/create", [\App\Http\Controllers\AdminController::class, "create"]);
    Route::get("/loginForm", [\App\Http\Controllers\AdminController::class, "loginForm"]);
    Route::post("/register", [\App\Http\Controllers\AdminController::class, "save"])->name("adminRegister");
    Route::post("/login", [\App\Http\Controllers\AdminController::class, "login"])->name("adminsLogin");
});
Route::prefix("/admins")->middleware("adminLoginCheck")->group(function () {
    Route::post("/logout", [\App\Http\Controllers\AdminController::class, "logout"]);
    Route::get("/detail", [\App\Http\Controllers\AdminController::class, "detail"])->name("adminsDetail");
    Route::get("/setProfile", [\App\Http\Controllers\AdminController::class, "setProfile"])->name("setProfile");
    Route::put("/profile", [\App\Http\Controllers\AdminController::class, "uploadProfile"])->name("uploadProfile");
    Route::get("/adminPanel", [\App\Http\Controllers\AdminController::class, "adminPanel"])->name("adminPanel");
    Route::get("/users/{id}", [\App\Http\Controllers\AdminController::class, "userInfo"]);
});
