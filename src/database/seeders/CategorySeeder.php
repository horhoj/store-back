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
        Category::factory()
            ->count(20)->create();

//        $data = [
//            [
//                'id' => 1,
//                'title' => 'Телефоны',
//                'description' => 'Телефоны, смартфоны, кнопочные телефоны',
//                'parent_id' => 5,
//            ],
//            [
//                'id' => 2,
//                'title' => 'Планшеты',
//                'description' => 'Планшеты, планшетные ПК',
//                'parent_id' => 5,
//            ],
//            [
//                'id' => 3,
//                'title' => 'компьютеры, ноутбуки',
//                'description' => 'компьютеры, ноутбуки',
//                'parent_id' => 4,
//            ],
//            [
//                'id' => 4,
//                'title' => 'вычислительная техника',
//                'description' => 'крупногабаритная вычислительная техника',
//                'parent_id' => 0,
//            ],
//            [
//                'id' => 5,
//                'title' => 'коммуникаторы',
//                'description' => 'малогабаритная вычислительная техника и средства связи',
//                'parent_id' => 0,
//            ]
//
//        ];
//
//        Category::insert($data);
    }
}
