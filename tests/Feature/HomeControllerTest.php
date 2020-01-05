<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testHomePageGet()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
