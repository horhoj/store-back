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
                'category_id' => 2,
            ]
        ];

                LnkProductCategory::insert($data);
    }
}
