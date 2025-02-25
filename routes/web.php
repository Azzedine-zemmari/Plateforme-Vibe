<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FreindController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::match(['get','post'],'/users', [UserController::class, 'index'])->name('users');
Route::get('/USERPROFILE/{userId}',[UserController::class,'showProfile'])->name('USERPROFILE');
Route::get("/EditProfile/{userId}",[UserController::class,'showEditProfile']);
Route::post('/UpdateProfile/{id}',[UserController::class,'updateProfile']);


Route::post('/userAdd',[FreindController::class,'addFreind']);
Route::get("/Myfreinds",[FreindController::class,'index'])->name('Myfreinds');
Route::post('/accepteRequest',[FreindController::class,'acceptFreind']);
Route::post('/cancel',[FreindController::class,'refuseFreind']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
