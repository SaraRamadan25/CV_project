<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WorkController;
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

Route::resource('/welcome',HomeController::class);
Route::resource('/about',AboutController::class);
Route::resource('/services',ServiceController::class);
Route::resource('/resume',ResumeController::class);
Route::resource('/projects',ProjectController::class);
Route::resource('/testimonials',TestimonialController::class);
Route::resource('/categories',CategoryController::class);
Route::get('/categories/{category:name}', [CategoryController::class,'show']);

Route::resource('/contact',ContactController::class);









