<?php

namespace App\repositories;

use App\Models\Category;

class CategoryRepository
{
    /**
     * @var Category
     */
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory(): array
    {
        $data = $this->category::all()->toArray();
//        $data = [
//          [
//              'id' => 1,
//              'title'=> true,
//              'description' => 'description 1',
//          ]
//        ];

        return $data;
    }
}
