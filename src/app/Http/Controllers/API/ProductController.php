<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\repositories\ProductRepository;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\API
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? '';
        $sort_field = $request['sort_field'] ?? 'id';
        $sort_asc = $request['sort_asc'] ?? '1';
        $per_page = $request['per_page'] ?? 10;

        return $this->productRepository->getProducts($search, $sort_field, $sort_asc, $per_page);
    }

    /**
     * @param Request $request
     *
     * @return \App\Models\Product|\App\Models\Product[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show(Request $request)
    {
        $id = $request['product'] ?? 0;

        return $this->productRepository->getProduct($id);
    }

    /**
     * @param ProductRequest $request
     *
     * @return string[]
     */
    public function update(ProductRequest $request): array
    {
        $id = $request['product'] ?? 0;
        $data = $request->all();

        return $this->productRepository->updateProduct($id, $data);
    }

    /**
     * @param ProductRequest $request
     *
     * @return array
     */
    public function store(ProductRequest $request): array
    {
        $data = $request->all();

        return $this->productRepository->storeProduct($data);
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function destroy(Request $request): array
    {
        $id = $request['product'] ?? 0;

        return $this->productRepository->delete($id);
    }
}
