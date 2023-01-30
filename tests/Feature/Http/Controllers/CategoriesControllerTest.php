<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {

        $data = [
            'categories_id' => \fake()->unique()->randomDigit(),
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100)
        ];

        $response = $this->get(route('categories', $data));
        $response->assertStatus(200);
    }

    public function testShowSuccessStatus(): void
    {
        $data = [
            'id' => \fake()->unique()->randomNumber(),
            'categories_id' => \fake()->unique()->randomDigit(),
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100)
        ];

        $response = $this->get(route('categories.show', $data));
        $response->assertStatus(200);
    }
}
