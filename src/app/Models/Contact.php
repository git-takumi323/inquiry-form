<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; // Categoryクラスをインポート

class Contact extends Model
{
    use HasFactory;
    /**
     * テーブル名
     */
    protected $table = 'contacts';

    /**
     * マスアサイン可能な属性
     */
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];
    /**
     * リレーション: Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class); // category_idを外部キーとして扱う
    }
}
