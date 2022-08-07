<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\SettingsController;
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

Route::get('/login',[AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/register',[AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);
Route::middleware('auth')->group(function () {
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});

Route::get('/forbiden', function() {
    return view('admin/auth/forbidden');
});


Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/', [HomeController::class, 'index']);

    // categories routes
    Route::resource('categories', CategoriesController::class)->except(['update', 'delete']);
    Route::post('categories/destroy', [CategoriesController::class, 'destroy'])
    ->name('categories.destroy');
    Route::post('categories/update', [CategoriesController::class, 'update'])
    ->name('categories.update');
    
    // posts routes
    Route::resource('posts', PostsController::class)->except(['update', 'delete']); 
    Route::post('posts/destroy', [PostsController::class, 'destroy'])
    ->name('posts.destroy');
    Route::post('posts/update', [PostsController::class, 'update'])
    ->name('posts.update');

    // testimonials routes
    Route::resource('testimonials', TestimonialsController::class)->except(['update', 'delete']); 
    Route::post('testimonials/destroy', [TestimonialsController::class, 'destroy'])
    ->name('testimonials.destroy');
    Route::post('testimonials/update', [TestimonialsController::class, 'update'])
    ->name('testimonials.update');

    // contactMessages routes
    Route::resource('contactMessages', ContactController::class)->except(['update', 'delete']); 
    Route::post('contactMessages/destroy', [ContactController::class, 'destroy'])
    ->name('contactMessages.destroy');
    Route::post('contactMessages/update', [ContactController::class, 'update'])
    ->name('contactMessages.update');
});


