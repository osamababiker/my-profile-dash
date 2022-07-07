<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
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

// Route::middleware(['first', 'second'])->group(function () {
    
// });


Route::get('/', [HomeController::class, 'index']);

Route::resource('categories', CategoriesController::class)->except([
    'update', 'delete'
]);

Route::resource('posts', PostsController::class)->except([
    'update', 'delete'
]);
