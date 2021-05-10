<?php

namespace App\repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * @var Product
     */
    private Product $product;
    private array $searchFields = [
        'products.title',
        'products.description',
        'products.options',
        'categories.title'
    ];

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProducts($search, $sort_field, $sort_asc, $per_page): array
    {
        $products = clone $this->product;
        foreach ($this->searchFields as $searchField) {
            $products = $products->orWhere($searchField, 'like', "%$search%");
        }
        return $products
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select([
                'products.*',
                'categories.title as category'
            ])->orderBy($sort_field, $sort_asc === '1' ? 'asc' : 'desc')->paginate($per_page)
            ->toArray();
    }

    public function getProduct($id): Product
    {
        $products = clone $this->product;

        return $products->findOrFail($id);
    }

    public function updateProduct($id, $data): array
    {
        $products = clone $this->product;
        $product = $products->findOrFail($id);
        $product->fill($data);
        $product->save();

        return ['status' => 'ok'];
    }

    public function storeProduct($data): array
    {
        $product = new $this->product();
        $product->fill($data);
        $product->save();

        return [
            'id' => $product->id
        ];
    }

    public function delete($id): array
    {
        $this->product->findOrFail($id)->delete();

        return [
            'id' => $id
        ];
    }
}
