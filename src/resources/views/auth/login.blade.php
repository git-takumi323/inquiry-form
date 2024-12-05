<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- メールアドレス入力 -->
        <div>
            <label for="email">メールアドレス</label>
            <input id="email" name="email" type="email" placeholder="例: test@example.com" value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- パスワード入力 -->
        <div>
            <label for="password">パスワード</label>
            <input id="password" name="password" type="password" placeholder="例: coachtech1106" required>
            @error('password')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- ログインボタン -->
        <button type="submit">ログイン</button>
    </form>

    <!-- ヘッダーリンク -->
    <a href="{{ route('register') }}">register</a>
</x-guest-layout>
