<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * 管理者ダッシュボードを表示する
     */
    public function dashboard()
    {
        return view('admin.dashboard'); // 管理者用ビューを表示
    }
}
