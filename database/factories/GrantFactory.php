<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Grant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Grant>
 */
class GrantFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeThisMonth();
        $end = mt_rand(0, 2) ? fake()->dateTimeBetween($start, '+1 month') : null;

        return [
            'description' => Str::ucfirst(fake()->words(mt_rand(3, 6), true)),
            'amount' => fake()->randomFloat(2, 90, 3000),
            'start' => $start,
            'end' => $end,
            'category_id' => optional(Category::query()->inRandomOrder()->first())->id,
            'created_by_id' => optional(User::query()->inRandomOrder()->first())->id,
        ];
    }
}
