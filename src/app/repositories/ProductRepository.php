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
    private array $searchFields = ['title', 'description', 'options'];

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

    public function getProduct($id)
    {
        $products = clone $this->product;
        return $products->findOrFail($id);
    }

    public function updateProduct($id, $data)
    {
        $products = clone $this->product;
        $product = $products->findOrFail($id);
        $product->fill($data);
        $product->save();
        return ['status' => 'ok'];

    }

    public function storeProduct($data)
    {
        $product = new $this->product;
        $product->fill($data);
        $product->save();
        return [
            'id' => $product->id
        ];
    }

    public function delete($id)
    {
        $this->product->findOrFail($id)->delete();
        return [
            'id'=>$id
        ];
    }


}
