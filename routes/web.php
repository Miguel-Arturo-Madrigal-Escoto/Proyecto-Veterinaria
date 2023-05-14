<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PetPhotoController;
use App\Http\Controllers\SocialMediaController;
use App\Mail\TestMailable;
use Illuminate\Support\Facades\Mail;
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

// Route::get('verify-email', function(){
//     return view('emails.verify-email', ['url' => 'https:://localhost:8000']);
// });

// Route::get('send-test-email', function(){
//     // Create email
//     $email = new TestMailable();

//     // send email
//     Mail::to('miguel@gmail.com')->send($email);

//     return 'email sent';
// });

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index');
});

// 'auth.check' => AuthCheck::class
Route::resource('pet', PetController::class)->middleware(['auth.check', 'verified']);
Route::resource('appointment', AppointmentController::class)->middleware(['auth.check', 'verified']);
Route::resource('vaccine', VaccineController::class)->middleware(['auth.check', 'verified']);

Route::controller(UserController::class)->group(function() {
    Route::get('user', 'index')->name('user.index')->middleware(['can:show-users', 'verified']);
    Route::get('user/{user}', 'show')->name('user.show')->middleware(['can:show-users', 'verified']);
});

Route::controller(PetController::class)->group(function() {
    Route::get('apply-vaccine', 'applyVaccineIndex')->name('apply-vaccine.index')->middleware(['auth.check', 'verified']);
    Route::post('apply-vaccine', 'applyVaccineStore')->name('apply-vaccine.store')->middleware(['auth.check', 'verified']);
});


Route::controller(VaccineController::class)->group(function() {
    Route::get('applied-vaccines', 'appliedVaccinesIndex')->name('applied-vaccines.index')->middleware(['auth.check', 'verified']);
});

// Routes for google auth
Route::controller(SocialMediaController::class)->group(function() {
    Route::get('auth/github', 'redirectToGithub')->name('auth.github');
    Route::get('auth/github/callback', 'callbackFromGithub')->name('auth.github.callback');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});


