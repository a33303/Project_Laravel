<?php

namespace Http\Controllers;

use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {

        $data = [
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format('d-m-Y H:i')
        ];

        $response = $this->get(route('news', $data));
        $response->assertStatus(200);
    }

    public function testShowSuccessStatus(): void
    {
        $data = [
            'id' => \fake()->unique()->randomNumber(),
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format('d-m-Y H:i')
        ];

        $response = $this->get(route('news.show', $data));
        $response->assertStatus(200);
    }
}
