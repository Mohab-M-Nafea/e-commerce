<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginRequest;
use App\Http\Requests\Customer\RegisterRequest;
use App\Models\Customer;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        Config::set('auth.providers.users.model', Customer::class);

        $this->customer = $customer;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if (auth()->attempt($request->validated())) {
            $customer = auth()->user();

            $token = $customer->createToken('customerToken')->accessToken;

            return $this->customer->sendResponse(
                'Customer login successfully',
                [
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'token' => $token
                ]
            );
        }

        return $this->customer->errorResponse(
            'Email or Password is wrong'
        );
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $customer = $this->customer->create($request->validated());

        $token = $customer->createToken('customerToken')->accessToken;

        return $this->customer->sendResponse(
            'Account created',
            [
                'name' => $customer->name,
                'email' => $customer->email,
                'token' => $token
            ],
            Response::HTTP_CREATED
        );
    }
}
