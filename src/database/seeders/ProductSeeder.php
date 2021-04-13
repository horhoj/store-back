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

//        $data = [];
//        for ($i = 1; $i <= 98; $i++) {
//            $numStr = ($i >= 1 && $i < 10) ? '0' . $i : $i;
//            $data[$i] = [
//                'id' => $i,
//                'title' => 't' . $numStr,
//                'description' => 'd' . $numStr,
//                'params' => 'p' . $numStr,
//            ];
//        }
//        Product::insert($data);
    }
}
