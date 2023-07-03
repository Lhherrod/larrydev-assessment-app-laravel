<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

Route::group(['middleware' => ['auth', 'verified']], (function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['namespace' => 'App\Actions'], function () {
        Route::get('/dashboard', 'DashboardAction')
        ->name('dashboard');

        Route::get('/users', 'UserAction')
        ->name('users.index')
        ->can('create', 'user');

        Route::patch('/users/{user}', 'UpdateUserAction')
        ->name('users.update')
        ->can('viewAny','user');
    });

    Route::resource('/assessment', AssessmentController::class)->except(['create', 'show']);

    Route::post('/media/store', MediaController::class)->name('media.store');

    Route::get('/assessment/image', [ImageController::class, 'index'])->name('image.index');
    Route::delete('/assessment/image/{image}', [ImageController::class, 'destroy'])->name('image.destroy');
    Route::get('/assessment/video', [VideoController::class, 'index'])->name('video.index');
    Route::delete('/assessment/video/{video}', [VideoController ::class, 'destroy'])->name('video.destroy');
}));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    abort(404);
});

require __DIR__.'/auth.php';