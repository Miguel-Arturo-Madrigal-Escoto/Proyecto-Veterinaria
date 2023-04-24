<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Http\Middleware\AuthCheck;
use App\Models\Appointment;
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

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index');
});

// 'auth.check' => AuthCheck::class
Route::resource('pet', PetController::class)->middleware('auth.check');
Route::resource('appointment', AppointmentController::class)->middleware('auth.check');
Route::resource('user', UserController::class)->middleware('auth.check.admin');
Route::resource('vaccine', VaccineController::class)->middleware('auth.check.admin');

Route::controller(PetController::class)->group(function() {
    Route::get('apply-vaccine', 'applyVaccineIndex')->name('apply-vaccine.index');
    Route::post('apply-vaccine', 'applyVaccineStore')->name('apply-vaccine.store');
})->middleware('auth.check.admin');

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


