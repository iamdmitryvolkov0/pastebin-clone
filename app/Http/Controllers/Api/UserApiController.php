<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * Register new user
     * @param CreateUserRequest $request
     * @param UserRepositoryContract $userRepository
     * @return JsonResponse
     */
    public function register(CreateUserRequest $request, UserRepositoryContract $userRepository): JsonResponse
    {
        //TODO: не ловит дату
        return response()->json([
            'message' => 'User created',
            'user' => $userRepository->register($request->validated()),
        ]);
    }

    /**
     * Get user profile data
     * @param UserServiceContract $userService
     * @return JsonResponse
     */
    public function profile(UserServiceContract $userService): JsonResponse
    {
        return response()->json($userService->profile());
    }

    /**
     * Login user
     * @param UserServiceContract $userService
     * @param Request $request
     * @return JsonResponse
     */
    public function login(UserServiceContract $userService, Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        return $userService->login($credentials);
    }

    /**
     * Logout user
     * @param UserServiceContract $userService
     * @return JsonResponse
     */
    public function logout(UserServiceContract $userService): JsonResponse
    {
        return $userService->logout();
    }
}
