@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="header">
    <h1>管理画面</h1>
    <div class="export-section">
        <form method="GET" action="{{ route('admin.export') }}" class="export-form">
            <button type="submit" class="export-button">エクスポート</button>
        </form>
    </div>
</div>

<!-- 検索フォーム -->
<form method="GET" action="{{ route('admin.index') }}" class="search-form">
    <input type="text" name="name" placeholder="名前" value="{{ request('name') }}">
    <input type="email" name="email" placeholder="メールアドレス" value="{{ request('email') }}">
    <select name="gender">
        <option value="">性別</option>
        <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
        <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
        <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
    </select>
    <select name="category_id">
        <option value="">お問い合わせ種類</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
            </option>
        @endforeach
    </select>
    <input type="date" name="date" value="{{ request('date') }}">
    <button type="submit">検索</button>
    <button type="reset" onclick="window.location='{{ route('admin.index') }}'">リセット</button>
</form>

<!-- データ表示 -->
<table>
    <thead>
        <tr>
            <th>名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせ種類</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? 'N/A' }}</td>
                <td>
                    <a href="#modal-{{ $contact->id }}" class="detail-link">詳細</a>
                </td>
            </tr>

            <!-- モーダルウィンドウ -->
            <div id="modal-{{ $contact->id }}" class="modal">
                <div class="modal-content">
                    <a href="#" class="close-modal">×</a>
                    <h2>詳細情報</h2>
                    <p>お名前: {{ $contact->first_name }} {{ $contact->last_name }}</p>
                    <p>性別: {{ $contact->gender }}</p>
                    <p>メールアドレス: {{ $contact->email }}</p>
                    <p>電話番号: {{ $contact->tel }}</p>
                    <p>住所: {{ $contact->address }}</p>
                    <p>建物名: {{ $contact->building }}</p>
                    <p>お問い合わせ種類: {{ $contact->category->content ?? 'N/A' }}</p>
                    <p>お問い合わせ内容: {{ $contact->detail }}</p>
                    <button>削除</button>
                </div>
            </div>
        @endforeach
    </tbody>
</table>

<!-- ページネーション -->
{{ $contacts->links() }}
@endsection
