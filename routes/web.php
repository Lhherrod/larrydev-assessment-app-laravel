<?php

use App\Enums\Status;
use App\Functions\GetStatus;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Services\AssessmentService;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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

Route::get('/contact', function () { 
    return view('contact'); 
})->name('contact');

Route::get('/about', function () { 
    return view('about'); 
})->name('about');

Route::post('/contact', [ContactController::class, 'create'])
->middleware('throttle:web')
->name('contact.create');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $assessmentStatus = Status::ASSESSMENT_STATUS;
        $assessmentCheckInStatus = Status::ASSESSMENT_CHECK_IN_STATUS;
        return view('dashboard')->with(['assessmentStatus'=> $assessmentStatus, 'assessmentCheckInStatus' => $assessmentCheckInStatus]);
    })->name('dashboard');

    Route::get('/users', function (): View {
        $userAdminStatus = auth()->user()->adminStatus;
        $users = UserService::getAllUsers();
        $adminStatus = GetStatus::setStatus(Status::ADMIN_STATUS);
        $assessmentStatus = GetStatus::setStatus(Status::ASSESSMENT_STATUS);
    
        return view('users.index')->with([
            'userAdminStatus' => $userAdminStatus,
            'users' => $users,
            'adminStatus' => $adminStatus,
            'assessmentStatus' => $assessmentStatus
    
        ]);
    })->name('users.index');

    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/assessment', function () {
        $user = auth()->user()->username;
        $assessmentStatus = GetStatus::setStatus(Status::ASSESSMENT_STATUS);
        $assessmentCheckInStatus = GetStatus::setStatus(Status::ASSESSMENT_CHECK_IN_STATUS);
        $checkAssessmentStatus = AssessmentService::getCheckAssessmentStatus();
        $checkAssessmentCheckInStatus = AssessmentService::getAssessmentCheckInStatus();

        return view('assessment.index')->with([
            'user' => $user,
            'assessmentStatus' => $assessmentStatus,
            'assessmentCheckInStatus' => $assessmentCheckInStatus, 
            'checkAssessmentStatus' => $checkAssessmentStatus, 
            'checkAssessmentCheckInStatus' => $checkAssessmentCheckInStatus
        ]);
    })->name('assessment.index');
    Route::post('/assessment', [AssessmentController::class, 'store'])->name('assessment.store');
    Route::get('/assessment/{user}/edit', [AssessmentController::class, 'edit'])->name('assessment.edit');
    Route::patch('/assessment/{user}/edit', [AssessmentController::class, 'update'])->name('assessment.update');
    Route::delete('/assessment/picture/{picture}', [ImageController::class, 'destroy']);
    Route::delete('/assessment/video/{video}', [VideoController::class, 'destroy']);
});


Route::fallback(function () {
    abort(404);
});

require __DIR__.'/auth.php';
