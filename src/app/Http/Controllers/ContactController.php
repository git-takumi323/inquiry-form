<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    // 入力ページ
    public function index()
    {
        // カテゴリデータを取得してビューに渡す
        $categories = Category::all();
        return view('contact.form', compact('categories'));
    }

    // 確認ページ
    public function confirm(ContactFormRequest $request)
{
    $validatedData = $request->validated();
    
    if ($validatedData === null) {
        \Log::info('Validation failed');
    }

    session(['contact_data' => $validatedData]);

    return view('contact.confirm', ['data' => $validatedData]);
}


    // サンクスページ
    public function thanks(Request $request)
    {
        // セッションからデータを取得
        $data = session('contact_data');

        try {
            // データをContactモデルに保存
            $contact = new Contact();
            $contact->last_name = $data['last_name'];
            $contact->first_name = $data['first_name'];
            $contact->gender = $data['gender'];
            $contact->email = $data['email'];
            $contact->tel = $data['tel'];
            $contact->address = $data['address'];
            $contact->building = $data['building'];
            $contact->type = $data['type'];
            $contact->content = $data['content'];
            $contact->save();

            // データが保存されたことをログに記録
            \Log::info('Contact data saved:', $contact->toArray());

        } catch (\Exception $e) {
            // 保存失敗時のエラーメッセージ
            return redirect()->route('contact.form')->with('error', 'データの保存に失敗しました。再度お試しください。');
        }

        // セッションのデータを削除
        session()->forget('contact_data');

        // サンクスページを表示
        return view('contact.thanks');
    }
}
