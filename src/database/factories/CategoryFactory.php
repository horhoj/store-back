<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'title' => 'Категория ' . random_int(100, 999),
            'description' => 'Описание категории '. random_int(100, 999),
        ];
    }
}
