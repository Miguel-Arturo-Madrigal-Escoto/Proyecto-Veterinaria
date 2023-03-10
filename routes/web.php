<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
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

Route::controller(HomeController::class)->group(function() {
    Route::get('/',       'index');
    Route::get('/create', 'create');
    Route::post('/', 'store');
    Route::get('/signin', 'signin_view');
    Route::post('/signin', 'signin_cliente');
});
Route::resource('cliente', ClienteController::class);
Route::resource('mascota', MascotaController::class)->parameters([
    'mascota' => 'mascota'
]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
