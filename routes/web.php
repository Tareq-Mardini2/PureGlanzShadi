<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminLoginController;

//==========================================================================================================

Route::get('/', [UserController::class, 'ViewHomePage'])->name('View.Home.Page');
Route::get('Datenschutz', [UserController::class, 'ViewDatenschutz'])->name('View.Datenschutz');
Route::get('Impressum', [UserController::class, 'ViewImpressum'])->name('View.Impressum');

//==========================================================================================================

Route::get('/admin-ShadiKurdi/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/check', [AdminLoginController::class, 'login'])->name('admin.login.submit');

//==========================================================================================================

Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/Dashboard/Create-Service', [AdminController::class, 'CreateService'])->name('Create.Service');
    Route::post('/services', [AdminController::class, 'store'])->name('service.store');
    Route::get('/Dashboard/Services', [AdminController::class, 'ViewServices'])->name('View.Services');
    Route::delete('/services/{service}', [AdminController::class, 'destroy'])->name('services.destroy');
    Route::get('Dashboard/edit-Service/{service}', [AdminController::class, 'edit'])->name('service.edit');
    Route::put('services/update/{service}', [AdminController::class, 'update'])->name('service.update');
});

//==========================================================================================================
