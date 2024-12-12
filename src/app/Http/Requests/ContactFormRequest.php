<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // 認証の確認が不要な場合はtrueに設定
    }

    public function rules()
    {
        return [
            'last_name' => 'required|string|max:255', // 姓は必須
            'first_name' => 'required|string|max:255', // 名は必須
            'gender' => 'required|in:male,female,other', // 性別は必須（選択肢は男性、女性、その他）
            'email' => 'required|email|max:255', // メールは必須で、形式チェック
            'tel' => 'required|regex:/^\d{10,11}$/', // 電話番号は10桁または11桁の数字
            'address' => 'required|string|max:255', // 住所は必須
            'type' => 'required|exists:categories,id', // お問い合わせの種類は必須で、categoriesテーブルに存在するID
            'content' => 'required|string|max:120', // お問い合わせ内容は必須で、最大120文字
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'phone.required' => '電話番号を入力してください',
            'phone.regex' => '電話番号は半角数字、ハイフンなしで入力してください',
            'address.required' => '住所を入力してください',
            'type.required' => 'お問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください',
            'content.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
