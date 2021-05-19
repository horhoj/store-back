<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\repositories\CategoryRepository;
use App\Types\APIIndexRequestParams;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;
    public const CATEGORY_ID = 'category';

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request): array
    {
        $APIIndexRequestParams = new APIIndexRequestParams($request);

        return $this->categoryRepository->getList($APIIndexRequestParams);
    }

    public function show(Request $request): array
    {
        $id = $request[self::CATEGORY_ID] ?? 0;

        return $this->categoryRepository->get($id);
    }

    public function update(CategoryRequest $request): array
    {
        $id = $request[self::CATEGORY_ID] ?? 0;
        $data = $request->all();

        return $this->categoryRepository->update($id, $data);
    }

    public function store(CategoryRequest $request): array
    {
        $data = $request->all();

        return $this->categoryRepository->store($data);
    }

    public function destroy(Request $request): array
    {
        $id = $request[self::CATEGORY_ID] ?? 0;

        return $this->categoryRepository->delete($id);
    }
}
