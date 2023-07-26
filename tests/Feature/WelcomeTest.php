<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testExample(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
