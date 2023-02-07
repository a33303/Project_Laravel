<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\NewsStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => \fake()->jobTitle(),
            'author' => \fake()->userName(),
            'status' => 'draft',
            'description' => \fake()->text(),
            'img' => \fake()->imageUrl(),
        ];
    }
}
