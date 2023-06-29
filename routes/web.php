<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\DropZoneController;
use App\Http\Controllers\ImageController;
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
        ->can('create', 'App\Models\User');

        Route::patch('/users/{user}', 'UpdateUserAction')
        ->name('users.update')
        ->middleware('can:viewAny,App\Models\User');
    });

    Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
    Route::post('/assessment', [AssessmentController::class, 'store'])->name('assessment.store');
    Route::get('/assessment/{user}/edit', [AssessmentController::class, 'edit'])->name('assessment.edit');
    Route::patch('/assessment/{user}/edit', [AssessmentController::class, 'update'])->name('assessment.update');
    Route::delete('/assessment/picture/{picture}', [ImageController::class, 'destroy'])->name('image.destroy');
    Route::delete('/assessment/video/{video}', [VideoController ::class, 'destroy'])->name('video.destroy');

    Route::post('/image/store', [DropZoneController::class, 'store'])->name('image.store');
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