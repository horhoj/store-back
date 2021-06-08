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
     * @throws \Exception
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Товар ' . random_int(10, 99),
            'description' => 'Описание товара ' . random_int(10, 99),
            'options' => random_int(1000, 9999),
        ];
    }
}
