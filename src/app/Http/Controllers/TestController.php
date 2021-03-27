<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
//        $data = DB::select(
//            'select products.id as pId,  products.title as x , categories.title as y from products
//                left join lnk_products_categories on lnk_products_categories.product_id = products.id
//                left join categories on lnk_products_categories.category_id = categories.id
//
//                  ');

//        $data = (new Product)
//            ->leftjoin('lnk_products_categories', 'lnk_products_categories.product_id', '=', 'products.id')
//            ->leftjoin('categories', 'lnk_products_categories.category_id', '=', 'categories.id')
//            ->select('products.id as pId', 'products.title as x', 'categories.title as y')
//            ->get();
//            ->toSql();

//        $res = json_encode($data);

        $data = (new Product)
            ->paginate(10)
            ->toArray();

        dd($data);
        return $data;
    }
}
