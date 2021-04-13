<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'title' => 'product title № ' . random_int(10, 99),
            'description' => 'product description № ' . random_int(10, 99),
            'params' => 'product params № ' . random_int(10, 99),
        ];
    }
}
