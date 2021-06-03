<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
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
                'category_id' => 1,
                'product_id' => 1,
            ],
            [
                'category_id' => 2,
                'product_id' => 1,
            ],
            [
                'category_id' => 5,
                'product_id' => 1,
            ],
            [
                'category_id' => 10,
                'product_id' => 1,
            ],

        ];

        DB::table('category_product')->insert($data);
    }
}
