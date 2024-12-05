<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Categoryモデルをインポート

class ContactController extends Controller
{
    // 入力ページ
    public function index()
    {
        $categories = Category::all();
        return view('contact.form', compact('categories'));
    }

    // 確認ページ
    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        return view('contact.confirm', ['data' => $validated]);
    }

    // サンクスページ
    public function thanks(Request $request)
    {
        // ここでDB登録やメール送信処理を行う場合がある
        return view('contact.thanks');
    }
}
