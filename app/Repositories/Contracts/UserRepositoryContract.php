<?php

namespace App\Repositories\Contracts;

interface UserRepositoryContract
{
    public function register(array $fields): void;
}
