<?php

namespace App\repositories;

use App\Models\Product;

class ProductRepository extends AbstractEntityRepository
{
    /**
     * @var Product
     */

    public function __construct(Product $product)
    {
        $this->entity = $product;
        $this->searchFields = [
            'id',
            'title',
            'description',
            'options',
        ];
    }
}
