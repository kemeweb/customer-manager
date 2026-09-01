<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/customers', 'pages::customer-list')->middleware('auth');

Route::get('/customers/create', [CustomerController::class, 'create']);

Route::post('/customers', [CustomerController::class, 'store']);

Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit']);

Route::put('/customers/{customer}', [CustomerController::class, 'update']);

Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);

Route::get('/customers/{customer}/pdf', [CustomerController::class, 'pdf']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);