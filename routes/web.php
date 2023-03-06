<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AproposController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/a-propos',[AproposController::class, 'index'])->name('a-propos');

//AUTH ROUTES
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//CONTACT ROUTES
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

//VOIR POST
Route::get('/posts/{post}/show', [PostController::class,'show'])->name('posts.show');

Route::group(['middleware' => ['auth',]], function() {
    //USERS ROUTES
    Route::group(['prefix' => 'users'], function() {

            Route::get('/',[UserController::class,'index'])->name('users.index');
            Route::get('/create', [UserController::class,'create'])->name('users.create');
            Route::post('/create', [UserController::class,'store'])->name('users.store');
            Route::get('/{user}/show', [UserController::class,'show'])->name('users.show');
            Route::get('/{user}/edit', [UserController::class,'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UserController::class,'update'])->name('users.update');
            Route::delete('/{user}/delete', [UserController::class,'destroy'])->name('users.destroy');
    });

    //POSTS ROUTES
    Route::group(['prefix' => 'posts'], function() {

            Route::get('/', [PostController::class,'index'])->name('posts.index');
            Route::get('/create', [PostController::class,'create'])->name('posts.create');
            Route::post('/create', [PostController::class,'store'])->name('posts.store');
            Route::get('/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
            Route::patch('/{post}/update', [PostController::class,'update'])->name('posts.update');
            Route::delete('/{post}/delete', [PostController::class,'destroy'])->name('posts.destroy');
    });
});