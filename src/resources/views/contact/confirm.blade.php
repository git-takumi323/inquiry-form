@extends('layouts.app')

@section('title', '確認画面')

@section('content')
<h1>確認画面</h1>

<table>
    <tr>
        <th>姓</th>
        <td>{{ $data['last_name'] }}</td>
    </tr>
    <tr>
        <th>名</th>
        <td>{{ $data['first_name'] }}</td>
    </tr>
    <tr>
        <th>性別</th>
        <td>{{ ucfirst($data['gender']) }}</td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{{ $data['email'] }}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{{ $data['tel'] }}</td>
    </tr>
    <tr>
        <th>住所</th>
        <td>{{ $data['address'] }}</td>
    </tr>
    <tr>
        <th>建物名</th>
        <td>{{ $data['building'] }}</td>
    </tr>
    <tr>
        <th>お問い合わせの種類</th>
        <td>{{ $data['type'] }}</td>
    </tr>
    <tr>
        <th>お問い合わせ内容</th>
        <td>{{ $data['content'] }}</td>
    </tr>
</table>

<form method="POST" action="{{ route('contact.thanks') }}">
    @csrf
    <button type="submit" class="btn btn-primary">送信する</button>
    <a href="{{ route('contact.form') }}" class="btn btn-secondary">戻る</a>
</form>
@endsection
