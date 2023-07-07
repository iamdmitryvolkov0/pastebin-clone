<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;

interface UserRepositoryContract
{
    public function register(array $fields);
}
