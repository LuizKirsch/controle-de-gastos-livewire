<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\Home;
use App\Livewire\User\Expenses;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Formulário de login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

// Processa o login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Processa o logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/counter', Counter::class)->name('counter');
    Route::get('/expenses', Expenses::class)->name('expenses');
});


