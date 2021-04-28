<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {

        $search = $request['search'] ?? '';
        $sort_field = $request['sort_field'] ?? 'id';
        $sort_asc = $request['sort_asc'] ?? '1';

        $data = $this->productRepository->getProducts($search, $sort_field, $sort_asc)
            ->paginate($request['per_page'] ?? 10)
            ->toArray();
        return $data;
    }

    public function show(Request $request)
    {
        $id = $request['product'] ?? 0;

        return $this->productRepository->getProduct($id);
    }

    public function update(ProductRequest $request)
    {
        $id = $request['product'] ?? 0;
        $data = $request->all();
//        return $id;
        return $this->productRepository->updateProduct($id, $data);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        return $this->productRepository->storeProduct($data);

    }

    public function destroy(Request $request)
    {
        $id = $request['product'] ?? 0;
        return $this->productRepository->delete($id);
    }

}
