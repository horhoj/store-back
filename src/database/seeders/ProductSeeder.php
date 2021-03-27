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
//         Product::factory()
//             ->count(100)->create();

        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[$i] = [
                'id' => $i,
                'title' => 'Product title ' . $i,
                'description' => 'Product description ' . $i,
                'params' => 'Product params ' .$i,
            ];
        }
        Product::insert($data);
    }
}
