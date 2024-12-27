<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * テーブル名
     */
    protected $table = 'users';

    /**
     * マスアサイン可能な属性
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * パスワードの隠蔽
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
