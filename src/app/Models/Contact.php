<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'type',
    ];
    /**
     * リレーション: Category
     */
    public function category()
{
    return $this->belongsTo(Category::class, 'category_id'); // category_idを外部キーとして扱う
}

    /**
     * リレーション: User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getGenderAttribute($value)
    {
        switch ($value) {
            case 'male':
                return '男';
            case 'female':
                return '女';
            case 'other':
                return 'その他';
            default:
                return $value;
        }
    }

}
