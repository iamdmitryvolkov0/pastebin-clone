<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\Contracts\UserServiceContract;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function store()
    {
        //TODO: need to add
    }

    public function profile(UserServiceContract $userService): JsonResponse
    {
        return response()->json($userService->profile());
    }

    public function login(UserServiceContract $userService, Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        return $userService->login($credentials);
    }

    public function logout(UserServiceContract $userService): JsonResponse
    {
        return $userService->logout();
    }
}
