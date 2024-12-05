<x-admin-layout>
    <form method="GET" action="{{ route('admin.index') }}">
        <input type="text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
        <select name="gender">
            <option value="all" {{ request('gender') === 'all' ? 'selected' : '' }}>性別</option>
            <option value="male" {{ request('gender') === 'male' ? 'selected' : '' }}>男性</option>
            <option value="female" {{ request('gender') === 'female' ? 'selected' : '' }}>女性</option>
        </select>
        <select name="type">
            <option value="">お問い合わせの種類</option>
            <option value="exchange" {{ request('type') === 'exchange' ? 'selected' : '' }}>商品の交換について</option>
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <button type="reset" onclick="window.location='{{ route('admin.index') }}'">リセット</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->gender }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->type }}</td>
                    <td>
                        <button onclick="showDetails({{ $inquiry->id }})">詳細</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $inquiries->links() }}
    <button onclick="window.location='{{ route('admin.export') }}'">エクスポート</button>
</x-admin-layout>
