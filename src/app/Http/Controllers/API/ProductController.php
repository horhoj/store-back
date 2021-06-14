<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\repositories\ProductRepository;
use App\Types\APIIndexRequestParams;
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
    private const PRODUCT_ID = 'product';
    private const RELATIONS = ['categories'];

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
    public function index(Request $request): array
    {
        $APIIndexRequestParams = new APIIndexRequestParams($request);

        return $this->productRepository->getList($APIIndexRequestParams, self::RELATIONS);
    }

    public function show(Request $request): array
    {
        $id = $request[self::PRODUCT_ID] ?? 0;

        return $this->productRepository->get($id, self::RELATIONS);
    }

    /**
     * @param ProductRequest $request
     *
     * @return string[]
     */
    public function update(ProductRequest $request): array
    {
        $id = $request[self::PRODUCT_ID] ?? 0;
        $data = $request->all();

        return $this->productRepository->update($id, $data, self::RELATIONS);
    }

    /**
     * @param ProductRequest $request
     *
     * @return array
     */
    public function store(ProductRequest $request): array
    {
        $data = $request->all();

        return $this->productRepository->store($data, self::RELATIONS);
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function destroy(Request $request): array
    {
        $id = $request[self::PRODUCT_ID] ?? 0;

        return $this->productRepository->delete($id);
    }
}
