<?php

namespace App\Http\Controllers;

use App\repositories\ProductRepository;

class TestController extends Controller
{
    public function index(ProductRepository $productRepository)
    {
        $data = $productRepository->getProducts('ноутб', 'title', '1');
        $data2 = $data
            ->paginate(1000)
                ->toArray()
//            ->toSql()
;
        dd($data2);
    }
}
