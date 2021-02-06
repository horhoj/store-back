<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Services\Entity\EntityRepository;

class CategoryController extends AbstractAPIController
{
    public function __construct(EntityRepository $entityRepository, Category $category)
    {
        parent::__construct($entityRepository, $category);
    }
}
