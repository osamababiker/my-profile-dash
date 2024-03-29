<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController; 
use App\Http\Controllers\Api\TestimonialsController;
use App\Http\Controllers\Api\ContactController; 

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/{slug}', [PostsController::class, 'show']);

Route::post('/contact/store', [ContactController::class, 'store']);

Route::get('/testimonials', [TestimonialsController::class, 'index']);
