<?php

use App\Events\MessageSent;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FreindController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;
use Illuminate\Support\Facades\Log;

Route::get('/welcome',function(){
    return view('welcome');
});
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

Route::middleware('auth')->group(function () {
    Route::get('/chat', [MessageController::class, 'getMessages']);
    Route::post('/send-message', [MessageController::class, 'sendMessage']);
});


// Route::post('/chat', function () {
//     $messageText = request('message_text');
//     $userId = request('user_Id') ?? Auth::id(); // Use user_Id from request or fallback to Auth::id()

//     if (!$messageText || !$userId) {
//         return response()->json(['error' => 'Invalid message'], 400);
//     }

//     // Save the message to the database
//     $message = Message::create([
//         'user_Id' => $userId,
//         'message_text' => $messageText,
//     ]);

//     // Broadcast the message
//     event(new MessageSent($message->toArray()));

//     return response()->json(['status' => 'Message sent']);
// });

require __DIR__.'/auth.php';    
