<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // 登録処理をカスタマイズ
        Fortify::createUsersUsing(CreateNewUser::class);

        // 登録ビューのカスタマイズ
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // ログインビューのカスタマイズ
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // カスタム認証ロジック
        Fortify::authenticateUsing(function (\Laravel\Fortify\Http\Requests\LoginRequest $request) {
            // フォームリクエストのバリデーションが自動的に実行される
            $user = \App\Models\User::where('email', $request->email)->first();

            if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        // 登録後のリダイレクト先を変更
        app()->singleton(RegisterResponse::class, function () {
            return new class implements RegisterResponse {
                public function toResponse($request)
                {
                    return redirect('/login'); // 登録後にログイン画面へリダイレクト
                }
            };
        });

        // ログイン後のリダイレクト先を変更
        app()->singleton(LoginResponse::class, function () {
            return new class implements LoginResponse {
                public function toResponse($request)
                {
                    return redirect('/admin'); // ログイン後にダッシュボードへリダイレクト
                }
            };
        });
    }
}
