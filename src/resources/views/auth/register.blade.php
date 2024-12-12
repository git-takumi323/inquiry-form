@extends('layouts.app')

@section('title', '管理者登録画面')

@section('content')
<form method="POST" action="{{ route('register') }}">
        @csrf

        <h1>ユーザー登録</h1>

        <div>
            <label for="name">お名前</label>
            <input id="name" name="name" type="text" placeholder="例: 山田 太郎" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input id="email" name="email" type="email" placeholder="例: test@example.com" value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">パスワード</label>
            <input id="password" name="password" type="password" placeholder="8文字以上で入力してください" required>
            @error('password')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">パスワード確認</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="パスワードを再入力してください" required>
        </div>

        <button type="submit">登録</button>
    </form>

    <a href="{{ route('login') }}">ログイン</a>
    @endsection
