<?php

namespace App\Http\Controllers\API\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function __invoke(Request $request)
    {
        return $request->user();
    }
}
