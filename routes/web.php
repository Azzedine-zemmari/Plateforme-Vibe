<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FreindController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessageController;
use PHPUnit\Framework\Attributes\PostCondition;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\SocialiteController;

Route::get('/',function(){
    return redirect()->route('login');
});


Route::get('login', [AuthenticatedSessionController::class, 'create'])
->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::match(['get','post'],'/users', [UserController::class, 'index'])->name('users');
Route::get('/USERPROFILE/{userId}',[UserController::class,'showProfile'])->name('USERPROFILE');
Route::get("/EditProfile/{userId}",[UserController::class,'showEditProfile']);
Route::post('/UpdateProfile/{id}',[UserController::class,'updateProfile']);


Route::post('/userAdd',[FreindController::class,'addFreind']);
Route::get("/Myfreinds",[FreindController::class,'index'])->name('Myfreinds');
Route::post('/accepteRequest',[FreindController::class,'acceptFreind']);
Route::post('/cancel',[FreindController::class,'refuseFreind']);

Route::get('/invite', [QrCodeController::class, 'handleInvitation'])->name('invite');
Route::get('/qr-code/{user_id}', [QrCodeController::class, 'generate'])->name('generate');


Route::prefix('post')->group(function() {
    Route::get('/all',[PostController::class,'showPosts'])->name('posts');
    Route::get('/postAdd',[PostController::class,'insertForm']);
    Route::post('/addPost',[PostController::class,'addPost'])->name('add');
    Route::post('/Edit',[PostController::class,'EditPost'])->name('Edit');
    Route::post('/Update',[PostController::class,'updatePost'])->name('update');
    Route::delete('/delete/{postId}',[PostController::class,'deletePost'])->name('delete');
});


Route::post('/like',[LikeController::class,'addLike'])->name('like');


Route::post('/Comment',[CommentaireController::class,'createComment'])->name('comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/messages/{id}/activate', [MessageController::class, 'activate'])->name('messages.activate');
Route::post('/send-location', [LocationController::class, 'store'])->name('send.location');
// Routes pour la connexion sociale
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

Route::get('/auth/facebook', [SocialiteController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [SocialiteController::class, 'handleFacebookCallback']);

require __DIR__.'/auth.php';
