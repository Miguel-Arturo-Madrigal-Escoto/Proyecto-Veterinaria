<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
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

/*
    Ruta resource (post,get,patch,put,delete,etc).
*/

// Route::resources([
//     'cliente' => ClienteController::class,
//     'mascota' => MascotaController::class
// ]);

Route::resource('cliente', ClienteController::class);
Route::resource('mascota', MascotaController::class)->parameters([
    'mascota' => 'mascota'
]);

