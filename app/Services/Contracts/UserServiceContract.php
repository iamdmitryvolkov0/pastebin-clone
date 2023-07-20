<?php

namespace App\Services\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

interface UserServiceContract
{
    public function login(array $credentials): JsonResponse;

    public function logout(): JsonResponse;

    public function profile(): string|Authenticatable;

    public function github(): RedirectResponse;

    public function githubRedirect(): void;
}
