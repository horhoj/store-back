<?php

namespace App\repositories;

use App\Models\Product;
use App\Types\APIIndexRequestParams;

class ProductRepository implements IEntityRepository
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

    public function getList(APIIndexRequestParams $APIIndexRequestParams): array
    {
        $products = clone $this->product;
        foreach ($this->searchFields as $searchField) {
            $products = $products->orWhere(
                $searchField,
                'like',
                "%" . $APIIndexRequestParams->getSearch() . "%"
            );
        }

        return $products
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select([
                'products.*',
                'categories.title as category'
            ])
            ->orderBy(
                $APIIndexRequestParams->getSortField(),
                $APIIndexRequestParams->getSortAsc() === '1' ? 'asc' : 'desc'
            )
            ->paginate($APIIndexRequestParams->getPerPage())
            ->toArray();
    }

    public function get($id): array
    {
        $products = clone $this->product;

        return $products->findOrFail($id)->toArray();
    }

    public function update($id, $data): array
    {
        $products = clone $this->product;
        $product = $products->findOrFail($id);
        $product->fill($data);
        $product->save();

        return ['status' => 'ok'];
    }

    public function store($data): array
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
