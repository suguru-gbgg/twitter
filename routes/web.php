<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/MainController', [App\Http\Controllers\MainController::class, 'insert'])->name('insert');
Route::get('/index', [App\Http\Controllers\MainController::class, 'front'])->name('front');
Route::post('/shousai', [App\Http\Controllers\MainController::class, 'shousai'])->name('shousai');
Route::get('/shousai', [App\Http\Controllers\MainController::class, 'shousai'])->name('shousai');
Route::post('/sakujo', [App\Http\Controllers\MainController::class, 'sakujo'])->name('sakujo');
Route::post('/hennshuu', [App\Http\Controllers\MainController::class, 'hennshuu'])->name('hennshuu');
Route::post('/kousin', [App\Http\Controllers\MainController::class, 'kousin'])->name('kousin');
Route::post('/profile', [App\Http\Controllers\MainController::class, 'profile'])->name('profile');