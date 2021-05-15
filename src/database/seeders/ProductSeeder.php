<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(100)->create();
//        $data = [
//            [
//                'id' => 1,
//                'title' => 'компьютер Никс 3000',
//                'description' => 'настольный персональный компьютер от компании Никс',
//                'options' => 'model 55h33d',
//                'category_id' => 3,
//            ],
//            [
//                'id' => 2,
//                'title' => 'компьютер Никс 4000',
//                'description' => 'настольный персональный компьютер от компании Никс',
//                'options' => 'model 77h33d',
//                'category_id' => 3,
//            ],
//            [
//                'id' => 3,
//                'title' => 'телефон Самсунг g-500',
//                'description' => 'Мобильный телефон от компании Самсунг',
//                'options' => 'model bb88-9ru',
//                'category_id' => 1,
//            ],
//            [
//                'id' => 4,
//                'title' => 'телефон Самсунг g-600',
//                'description' => 'Мобильный телефон от компании Самсунг',
//                'options' => 'model bb66-7ru',
//                'category_id' => 1,
//            ],
//            [
//                'id' => 5,
//                'title' => 'телефон Самсунг g-700',
//                'description' => 'Мобильный телефон от компании Самсунг',
//                'options' => 'model bb55-3ru',
//                'category_id' => 1,
//            ],
//            [
//                'id' => 6,
//                'title' => 'компьютер Никс 2000',
//                'description' => 'настольный персональный компьютер от компании Никс',
//                'options' => 'model 11h11d',
//                'category_id' => 3,
//            ],
//        ];

//        Product::insert($data);
    }
}
