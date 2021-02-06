<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Services\Entity\EntityRepository;

class ProductController extends AbstractAPIController
{
    public function __construct(EntityRepository $entityRepository, Product $product)
    {
        parent::__construct($entityRepository, $product);
    }
}
