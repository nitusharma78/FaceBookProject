<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{

   CommentController,
    PostController,
 
    ProfileController,
    LikeController,
    HomeController,
    


};
use App\Http\Controllers\Auth\{
    FacebookController,
    LoginController,
    RegisterController,
};


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


Route::get('feed/', [LoginController::class, 'index'])->name('index');
Route::post('logout/', [LoginController::class, 'logout'])->name('logout');


Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('post/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/feed', [PostController::class, 'index'])->name('feed.index');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});