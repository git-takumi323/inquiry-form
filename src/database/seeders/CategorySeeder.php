<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            '商品の交換について',
            '商品の配送について',
            '商品のトラブル',
            'ショップへのお問い合わせ',
            'その他',
        ];
    
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'content' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
