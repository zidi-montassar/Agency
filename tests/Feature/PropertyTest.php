<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_check_nonexistant_property(): void
    {
        $response = $this->get('/properties/fifth-6');
        $response->assertStatus(404);
    }

    public function test_check_existant_property(): void
    {
        $response = $this->get('/properties/fifth-6');
        $response->assertStatus(404);
    }
}
