<?php
namespace App\Http\Controllers;

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
Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/auth/login',[AuthController::class, 'login']);
Route::post('/auth/logout',[AuthController::class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
    Route::middleware('role:farmer')->prefix('config')->name('config.')->group(function(){
        Route::get('heater', [ConfigHeaterController::class, 'index']);
    });
    Route::middleware('role:admin')->prefix('manage')->name('manage.')->group(function(){
        Route::resource('users', UserController::class);
        Route::resource('devices', DeviceController::class);
    });
});
