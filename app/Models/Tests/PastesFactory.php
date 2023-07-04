<?php

namespace App\Models\Tests;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Factories\Factory;

class PastesFactory extends Factory
{
    protected $model = Paste::class;

    public function definition(): array
    {
        $hash = bcrypt($this->faker->text);

        return [
            'title' => $this->faker->text,
            'body' => $this->faker->unique()->text,
            'hash_link' => $hash,
        ];
    }
}
