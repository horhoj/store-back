<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Category::factory()
//            ->count(20)->create();

        $data = [
            [
                'id' => 1,
                'title' => 'Телефоны',
                'description' => 'Телефоны, смартфоны, кнопочные телефоны',
            ],
            [
                'id' => 2,
                'title' => 'Планшеты',
                'description' => 'Планшеты, планшетные ПК',
            ],
            [
                'id' => 3,
                'title' => 'компьютеры',
                'description' => 'компьютеры, ноутбуки',
            ],

        ];

        Category::insert($data);
    }
}
