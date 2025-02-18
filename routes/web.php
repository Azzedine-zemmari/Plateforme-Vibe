<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\testMidlleware;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/Home','Home',['name'=>'azzedine']);

// route parameter
Route::get("/admin/{id}",function(string $id){
    return 'User ' . $id;
});

// route parameter optional
Route::get("/admin/{id?}",function(?string $id = null){
    return 'User ' . $id;
});
// route parametre with condition on the parametere
Route::get("/admin/{id}",function(string $id){
    return 'User ' . $id;
})->where('name','[A-Za-z]+');
// register
Route::get('/user/register',[UserController::class,'create'])->name('user.create');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');
// login
Route::get('/loginForm',[UserController::class,'showLoginForm'])->name('user.login');
Route::post('/login',[UserController::class,'login'])->name('user.submit');
