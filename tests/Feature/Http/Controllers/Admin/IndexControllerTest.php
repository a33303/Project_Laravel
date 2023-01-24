<?php

namespace Http\Controllers\Admin;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('admin.index'));

        $response->assertSeeText('Админка');
        $response->assertSeeText('Админка новостного портала');

        $response->assertStatus(200);
    }

}
