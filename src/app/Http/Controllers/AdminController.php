<?php

namespace App\Http\Controllers;

use App\Models\Contact; // データモデル
use App\Models\Category; // カテゴリモデル
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // バリデータを使う
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // 名前とメールアドレスの部分一致検索
        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%')
                  ->orWhere('last_name', 'like', '%' . $request->name . '%');
            });
        }

        // メールアドレスの部分一致検索
        if ($request->filled('email')) {
            $emailSearch = $request->email;

            // メールアドレスに＠が含まれていなければ部分一致検索
            if (strpos($emailSearch, '@') === false) {
                $emailSearch = '%' . $emailSearch . '%'; // 部分一致検索
            } else {
                $emailSearch = '%' . $emailSearch . '%'; // 完全一致も含む部分一致
            }

            $query->where('email', 'like', $emailSearch);
        }

        // 性別の完全一致検索
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        // お問い合わせ種類の完全一致検索
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 日付検索
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // ページネーションで7件ごとにデータを表示
        $contacts = $query->paginate(7);

        // カテゴリデータを取得
        $categories = Category::all();

        // ビューにデータを渡す
        return view('admin.dashboard', compact('contacts', 'categories'));
    }

    public function exportCsv(Request $request)
{
    // 基本のクエリを設定
    $query = Contact::query();

    // 検索条件の適用（indexメソッドと同様）
    if ($request->filled('name')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->name . '%')
              ->orWhere('last_name', 'like', '%' . $request->name . '%');
        });
    }

    if ($request->filled('email')) {
        $emailSearch = $request->email;

        // メールアドレスに＠が含まれていなければ部分一致検索
        if (strpos($emailSearch, '@') === false) {
            $emailSearch = '%' . $emailSearch . '%'; // 部分一致検索
        } else {
            $emailSearch = '%' . $emailSearch . '%'; // 完全一致も含む部分一致
        }

        $query->where('email', 'like', $emailSearch);
    }

    if ($request->filled('gender') && $request->gender !== 'all') {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    // 検索条件が適用されたデータを取得（paginateではなく、すべて取得）
    $contacts = $query->get(); // get()で絞り込まれたデータをすべて取得

    // CSVファイル名の生成
    $csvFileName = 'contacts_' . now()->format('Ymd_His') . '.csv';
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$csvFileName\"",
    ];

    // CSV出力のコールバック処理
    $callback = function () use ($contacts) {
        $output = fopen('php://output', 'w');
        fputcsv($output, ['名前', '性別', 'メールアドレス', 'お問い合わせ種類', '作成日']);

        foreach ($contacts as $contact) {
            fputcsv($output, [
                $contact->first_name . ' ' . $contact->last_name,
                $contact->gender,
                $contact->email,
                $contact->category->content ?? 'N/A',
                $contact->created_at->format('Y-m-d'),
            ]);
        }

        fclose($output);
    };

    return response()->stream($callback, 200, $headers);
}


}
