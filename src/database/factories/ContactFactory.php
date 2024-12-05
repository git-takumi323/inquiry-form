<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->numerify('080#######'),
            'address' => $this->faker->address,
            'building' => $this->faker->secondaryAddress,
            'detail' => $this->faker->text(120),
            'type' => $this->faker->randomElement([
                '1.新規問い合わせ',
                '2.フォローアップ',
                '3.苦情',
                '4.フィードバック',
                '5.その他',
            ]), // ランダムにタイプを設定
            'category_id' => Category::inRandomOrder()->first()->id, // カテゴリをランダムに設定
        ];
    }
}
