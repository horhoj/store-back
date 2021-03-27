<?php


namespace App\repositories;


use App\Models\Product;

class ProductRepository
{
    /**
     * @var Product
     */
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProducts()
    {
        $data = $this->product
            ->paginate(10)
            ->toArray();
        return $data;
    }
}
