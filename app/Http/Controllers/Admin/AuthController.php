<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    private User $admin;

    public function __construct(User $admin)
    {
        Config::set('auth.providers.users.model', User::class);

        $this->admin = $admin;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if (auth()->attempt($request->validated())) {
            $admin = auth()->user();

            $token = $admin->createToken('adminToken')->accessToken;

            return $this->admin->sendResponse(
                'Admin login successfully',
                [
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'token' => $token
                ]
            );
        }

        return $this->admin->errorResponse(
            'Email or Password is wrong'
        );
    }
}
