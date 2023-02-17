<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
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
})
    ->name('home');


Route::resource('/welcome',HomeController::class)->middleware('auth');
Route::resource('/about',AboutController::class)->middleware('auth');
Route::resource('/services',ServiceController::class)->middleware('auth');
Route::resource('/resume',ResumeController::class)->middleware('auth');
Route::resource('/projects',ProjectController::class)->middleware('auth');
Route::resource('/testimonials',TestimonialController::class)->middleware('auth');
Route::resource('/categories',CategoryController::class);
Route::get('/categories/{category:name}', [CategoryController::class,'show'])->name('categories.show');

Route::resource('/contact',ContactController::class);



Auth::routes();


