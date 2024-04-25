<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', function () {
    return view('index');
});


Route::middleware('auth')->group(function () {

    Route::get('welcome', [HomeController::class, 'index'])->name('welcome.index'); //last authenticated user

    Route::resource('education', EducationController::class);

    Route::resource('experience', ExperienceController::class);

    Route::resource('project', ProjectController::class);
    
    Route::resource('testimonial', TestimonialController::class);

    Route::resource('service', ServiceController::class);

    Route::get('skill/create', [SkillController::class, 'create']);
    Route::post('skill', [SkillController::class, 'store']);
    Route::get('skill/{skill}/edit', [SkillController::class, 'edit']);
    Route::patch('skill/{skill}', [SkillController::class, 'update']);

    Route::get('/users/{user:username}', [UserController::class, 'show'])->name('user.show');

    /*Route::get('user', [UserController::class,'index'])->name('user.index');
    Route::get('user/{user}/edit', [UserController::class,'edit'])->name('user.edit');
    Route::patch('user/{user}', [UserController::class,'update'])->name('user.update');*/

    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/{category:name}', [CategoryController::class, 'show'])->name('category.show');

    Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact', [ContactController::class, 'store']);

});

Auth::routes();


