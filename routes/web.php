<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

// Google captcha key required for app test

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::group(['namespace'  => 'App\Actions'], function () {
    Route::post('/contact', 'ContactAction')
    ->name('contact.store')
    ->middleware('throttle:web');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['namespace' => 'App\Actions'], function () {
        Route::get('/dashboard', 'DashboardAction')
        ->name('dashboard');

        Route::get('/assessment', 'AssessmentAction')
        ->name('assessment.index');

        Route::get('/users', 'UserAction')
        ->name('users.index')
        ->can('create', 'App\Models\User');
    });

    Route::patch('/users/{user}', [UserController::class, 'update'])
    ->name('users.update')
    ->can('create', 'App\Models\User');

    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/assessment', [AssessmentController::class, 'store'])->name('assessment.store');
    Route::get('/assessment/{user}/edit', [AssessmentController::class, 'edit'])->name('assessment.edit');
    Route::patch('/assessment/{user}/edit', [AssessmentController::class, 'update'])->name('assessment.update');
    Route::delete('/assessment/picture/{picture}', [ImageController::class, 'destroy'])->name('image.destroy');
    Route::delete('/assessment/video/{video}', [VideoController::class, 'destroy'])->name('video.destroy');
});

Route::fallback(function () {
    abort(404);
});

require __DIR__.'/auth.php';
