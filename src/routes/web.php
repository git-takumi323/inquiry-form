<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use Laravel\Fortify\Fortify;

// お問い合わせ関連
Route::get('/', [ContactController::class, 'index'])->name('contact.form');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// 管理画面
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index'); // 管理画面トップ
    Route::get('/export', [AdminController::class, 'exportCsv'])->name('admin.export'); // CSVエクスポート
});

// 認証関連
// Fortifyの登録ビュー
Fortify::registerView(function () {
    return view('auth.register');
});
// Fortifyのログインビュー
Fortify::loginView(function () {
    return view('auth.login');
});
