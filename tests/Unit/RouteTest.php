<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Response;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('hotel/detail/13');

        $response->assertStatus(404);
    }
}
