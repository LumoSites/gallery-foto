<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;

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

Route::get('/', [FotoController::class, 'index']);

Route::middleware('guest')->group(function() {

    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'authentic']);

    Route::get('/registrasi', [AuthenticateController::class, 'registrasi']);
    Route::post('/registrasi', [AuthenticateController::class, 'store']);

});

Route::middleware('auth')->group(function() {

    Route::get('/logout', [AuthenticateController::class, 'logout']);

    Route::get('/detail-foto/{id}', [FotoController::class, 'detail']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::middleware('admin')->group(function() {
        Route::get('/users', [DashboardController::class, 'users']);
        Route::delete('/user-delete/{id}', [DashboardController::class, 'userDeleted']);

        Route::get('/categoris', [CategoriController::class, 'index']);
        Route::get('/categori-add', [CategoriController::class, 'add']);
        Route::post('/categori-add', [CategoriController::class, 'store']);
        Route::get('/categori-edit/{id}', [CategoriController::class, 'edit']);
        Route::put('/categori-edit/{id}', [CategoriController::class, 'update']);
        Route::delete('/categori-delete/{id}', [CategoriController::class, 'destroy']);
    });

    Route::get('/fotos', [FotoController::class, 'dashboardFoto']);
    Route::get('/foto-add', [FotoController::class, 'add']);
    Route::post('/foto-add', [FotoController::class, 'store']);
    Route::get('/foto-edit/{id}', [FotoController::class, 'edit']);
    Route::put('/foto-edit/{id}', [FotoController::class, 'update']);
    Route::delete('/foto-delete/{id}', [FotoController::class, 'destroy']);

    Route::get('/categoris-home', [DashboardController::class, 'categori']);
    Route::get('/categori-detail/{id}', [DashboardController::class, 'categoriDetail']);

});
