<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// お問い合わせ関連
Route::get('/', [ContactController::class, 'index'])->name('contact.form');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// 管理画面
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// 認証関連
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
