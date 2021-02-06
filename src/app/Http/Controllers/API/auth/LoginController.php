<?php

namespace App\Http\Controllers\API\auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Carbon $carbon
     * @param Auth $auth
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, Carbon $carbon, Auth $auth)
    {
        $credentials = $request->only('email', 'password');

        if (!$auth::attempt($credentials)) {
            return response()->json([
                'message' => 'You cannot sign with those credentials',
                'errors' => 'Unauthorised'
            ], 401);
        }

        $token = $auth::user()->createToken(config('app.name'));
        $token->token->expires_at =  $carbon::now()->addMonths(3);

        $token->token->save();

        return response()->json([
            'token_type' => 'Bearer',
            'token' => $token->accessToken,
            'expires_at' => $carbon::parse($token->token->expires_at)->toDateTimeString()
        ], 200);
    }
}
