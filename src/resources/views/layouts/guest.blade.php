<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

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
            <input id="password" name="password" type="password" placeholder="例: coachtech1106" required>
            @error('password')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">登録</button>
    </form>

    <a href="{{ route('login') }}">login</a>
</x-guest-layout>