<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
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


//guest routes
Route::get('/',function (){
   return view('index');
});


// admin routes

Route::middleware('admin')->group(function () {
    Route::resource('category', CategoryController::class)->only('create','store','edit','update','destroy');
    Route::resource('education', EducationController::class)->only('create','store','edit','update');
    Route::resource('experience', ExperienceController::class)->only('create','store','edit','update');
    Route::resource('contact', ContactController::class)->only('index','show','destroy');

    Route::resource('user', UserController::class);
});


// authenticated routes
Route::middleware('auth')->group(function () {

    Route::get('welcome', [HomeController::class, 'index'])->name('welcome.index'); //last authenticated user

    Route::resource('education', EducationController::class)->only('index');

    Route::resource('project', ProjectController::class);

    Route::resource('service', ServiceController::class);

    Route::get('contact', [ContactController::class, 'create'])->name('contact.create');

    Route::post('contact', [ContactController::class, 'store']);

    Route::resource('testimonial', TestimonialController::class);

    Route::resource('category', CategoryController::class)->only('index','show');

    Route::get('skill/create', [SkillController::class,'create']);
    Route::post('skill', [SkillController::class,'store']);
    Route::get('skill/{skill}/edit', [SkillController::class,'edit']);
    Route::patch('skill/{skill}', [SkillController::class,'update']);
});




Auth::routes();


