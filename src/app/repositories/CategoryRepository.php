<?php

namespace App\repositories;

use App\Models\Category;

class CategoryRepository extends AbstractEntityRepository
{
    /**
     * @var Category
     */

    public function __construct(Category $category)
    {
        $this->entity = $category;
        $this->searchFields = [
            'id',
            'title',
            'description',
        ];
    }
}
