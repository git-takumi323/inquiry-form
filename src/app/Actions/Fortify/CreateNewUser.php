<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Http\Requests\RegisterUserRequest; // フォームリクエストをインポート
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input)
    {
        // フォームリクエストを使用してバリデーションを実行
        $validated = app(RegisterUserRequest::class)->merge($input)->validated();

        return User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    }
}
