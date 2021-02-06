<?php

namespace App\Http\Controllers\API\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function __invoke(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'logout']);
    }
}
