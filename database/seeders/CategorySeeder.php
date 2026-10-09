<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['content' => '商品のお届けについて'],
            ['content' => '商品の交換について'],
            ['content' => '不具合報告'],
            ['content' => 'ショップへのお問い合わせ'],
            ['content' => 'その他'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
