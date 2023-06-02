<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\EducationController;
use App\Http\Controllers\api\ExperienceController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\SkillController;
use App\Http\Controllers\api\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']
);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('service', ServiceController::class);
    Route::apiResource('testimonial', TestimonialController::class);
    Route::apiResource('project', ProjectController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('experience', ExperienceController::class);
    Route::apiResource('education', EducationController::class);
    Route::apiResource('skill', SkillController::class);
    Route::apiResource('contact', ContactController::class)->only(['update', 'store']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

