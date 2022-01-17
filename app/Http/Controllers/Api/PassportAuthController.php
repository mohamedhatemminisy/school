<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\Api\StatusCollection;

class PassportAuthController extends Controller
{
    /**
     * Take user credential and make him login 
     *
     * @param  \Illuminate\Http\LoginRequest  $request
     * @return \Illuminate\Http\LoginRequest
     */
    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return (new StatusCollection(true, trans('api.user_login'), $token))
                ->response()->setStatusCode(200);
        } else {
            return (new StatusCollection(false, trans('api.data_not_valid')))->response()->setStatusCode(401);
        }
    }
}
