<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $data = DB::select('select * from lnk_products_categories');

        $res = json_encode($data);
//        dd($res);
        return $data;
    }
}
