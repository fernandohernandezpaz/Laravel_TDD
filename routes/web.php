<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PostController;

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


Route::resource('cards', CardController::class);
Route::resource('posts', PostController::class);
//Route::get('cards/{id}', [CardController::class, 'show'])
//    ->name('cards.show');
//Route::put('cards/{id}', [CardController::class, 'update'])
//    ->name('cards.update');