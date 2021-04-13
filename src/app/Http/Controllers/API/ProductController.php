<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $sort_asc = $request['sort_asc'] ?? 1;

        $data = $this->productRepository->getProducts($search, $sort_field, $sort_asc)
            ->paginate($request['per_page'] ?? 10)
            ->toArray();
        return $data;
    }
}
