@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<form method="POST" action="{{ route('contact.confirm') }}" class="contact-form">
    @csrf

    <!-- 姓 -->
    <div class="form-group">
        <label for="last_name">姓 <span>※</span></label>
        <input id="last_name" name="last_name" type="text" placeholder="例: 山田" value="{{ old('last_name') }}" required>
        @error('last_name')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- 名 -->
    <div class="form-group">
        <label for="first_name">名 <span>※</span></label>
        <input id="first_name" name="first_name" type="text" placeholder="例: 太郎" value="{{ old('first_name') }}" required>
        @error('first_name')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- 性別 -->
    <div class="form-group">
        <label>性別 <span>※</span></label>
        <div class="gender-options">
            <input type="radio" id="male" name="gender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }}>
            <label for="male">男性</label>
            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
            <label for="female">女性</label>
            <input type="radio" id="other" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
            <label for="other">その他</label>
        </div>
        @error('gender')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- メールアドレス -->
    <div class="form-group">
        <label for="email">メールアドレス <span>※</span></label>
        <input id="email" name="email" type="email" placeholder="例: test@example.com" value="{{ old('email') }}" required>
        @error('email')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- 電話番号 -->
    <div class="form-group">
        <label for="tel">電話番号 <span>※</span></label>
        <input id="tel" name="tel" type="text" placeholder="08012345678" value="{{ old('tel') }}" required>
        @error('phone')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- 住所 -->
    <div class="form-group">
        <label for="address">住所 <span>※</span></label>
        <input id="address" name="address" type="text" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" required>
        @error('address')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- 建物名 -->
    <div class="form-group">
        <label for="building">建物名</label>
        <input id="building" name="building" type="text" placeholder="例: オフィスビル5階" value="{{ old('building') }}">
    </div>

    <!-- お問い合わせの種類 -->
    <div class="form-group">
        <label for="category_id">お問い合わせの種類 <span>※</span></label>
        <select id="category_id" name="category_id" required>
            <option value="">選択してください</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- お問い合わせ内容 -->
    <div class="form-group">
        <label for="content">お問い合わせ内容 <span>※</span></label>
        <textarea id="content" name="content" placeholder="お問い合わせ内容をご記入ください" required>{{ old('content') }}</textarea>
        @error('content')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">確認画面へ進む</button>
    </div>
</form>
@endsection