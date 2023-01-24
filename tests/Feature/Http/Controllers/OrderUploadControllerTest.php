<?php

namespace Http\Controllers;

use Tests\TestCase;

class OrderUploadControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('upload.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('upload.create'));

        $response->assertStatus(200);
    }

    public function testStoreSuccessStatus(): void
    {
        $response = $this->get(route('upload.store'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessDate(): void
    {
        $data = [
            'success' => true
        ];
        $response = $this->post(route('upload.store'), $data);

        $response->assertStatus(200)
            ->json($data);
    }
}
