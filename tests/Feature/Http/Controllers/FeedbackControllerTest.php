<?php

namespace Http\Controllers;

use Tests\TestCase;
use function PHPUnit\Framework\assertFileExists;

class FeedbackControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('feedback.create'));

        $response->assertStatus(200);
    }

    public function testStoreSuccessStatus(): void
    {
        $response = $this->get(route('feedback.store'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessDate(): void
    {
        $data = [
            'success' => true
        ];
        $response = $this->post(route('feedback.store'), $data);

        $response->assertStatus(200)
            ->json($data);
    }
}
