<?php

namespace Database\Seeders;

use App\Models\LnkProductCategory;
use Illuminate\Database\Seeder;

class LnkProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'product_id' => 1,
                'category_id' => 1,
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'category_id' => 2,
            ],
            [
                'id' => 3,
                'product_id' => 3,
                'category_id' => 3,
            ],
            [
                'id' => 4,
                'product_id' => 4,
                'category_id' => 1,
            ],
            [
                'id' => 5,
                'product_id' => 5,
                'category_id' => 2,
            ],
            [
                'id' => 6,
                'product_id' => 6,
                'category_id' => 3,
            ],
            [
                'id' => 7,
                'product_id' => 7,
                'category_id' => 1,
            ],
            [
                'id' => 8,
                'product_id' => 8,
                'category_id' => 2,
            ],
            [
                'id' => 9,
                'product_id' => 9,
                'category_id' => 3,
            ],
            [
                'id' => 10,
                'product_id' => 10,
                'category_id' => 1,
            ],
            [
                'id' => 11,
                'product_id' => 1,
                'category_id' => 2,
            ],
        ];

                LnkProductCategory::insert($data);
    }
}
