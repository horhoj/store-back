<?php


namespace App\repositories;


use App\Models\Product;
use phpDocumentor\Reflection\Types\Integer;

class ProductRepository
{
    /**
     * @var Product
     */
    private Product $product;
    private $searchFields = ['title', 'description', 'params'];

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProducts($search, $sort_field, $sort_asc)
    {
        $products = clone $this->product;

        foreach ($this->searchFields as $searchField) {
            $products = $products->orWhere($searchField, 'like', "%$search%");
        }
        return $products->orderBy($sort_field, $sort_asc === '1' ? 'asc' : 'desc');
    }

    public function getProduct($id) {
        $products = clone $this->product;
        return $products->findOrFail($id);
    }
}
