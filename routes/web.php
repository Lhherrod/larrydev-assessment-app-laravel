<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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
})->name('landing');

Route::get('/contact', function () { return view('contact'); })->name('contact.index');

Route::post('/contact', [ContactController::class, 'create'])->name('contact.create')->middleware(ProtectAgainstSpam::class);

Route::get('/dashboard/', function () {
    $assessmentStatus = auth()->user()->assessmentStatus;
    $assessmentCheckInStatus = auth()->user()->assessmentCheckInStatus;
    return view('dashboard')->with(['assessmentStatus'=> $assessmentStatus, 'assessmentCheckInStatus' => $assessmentCheckInStatus]);
})->name('dashboard')->middleware(['middleware' => 'auth', 'verified']);

Route::get('/users', [UserController::class, 'index'])->middleware(['middleware' => 'auth', 'verified'])
->name('users.index');


Route::put('/users/{user}', [UserController::class, 'update'])->middleware(['middleware' => 'auth', 'verified'])
->name('users.update');


Route::group(['middleware' => 'auth', 'verified'], function () {
    
    Route::get('/assessment', [AssessmentController::class, 'index'])->middleware(['middleware' => 'auth', 'verified'])->name('assessment.index');

    Route::post('/assessment', [AssessmentController::class, 'store'])->middleware(['middleware' => 'auth', 'verified'])->name('assessment.store');

    Route::get('/assessment/{user}/edit', [AssessmentController::class, 'edit'])->name('assessment.edit')->middleware(['middleware' => 'auth', 'verified']);

    Route::put('/assessment/{user}/edit', [AssessmentController::class, 'update'])->middleware(['middleware' => 'auth', 'verified'])
    ->name('assessment.update');

});

Route::delete('/assessment/{picture}', [ImageController::class, 'destroy'])->middleware(['middleware' => 'auth', 'verified']);

Route::delete('/assessment/video/{video}', [VideoController::class, 'destroy'])->middleware(['middleware' => 'auth', 'verified']);

require __DIR__.'/auth.php';
