<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_store_a_task()
    {
        $response = $this->post(route('store'), [
            'name' => 'Walk a dog',
            'duration' => 'everyday',
            'durationName' => 'Everyday',
            'status' => 'pending'
        ]);

        $response->assertRedirect('/');
    }

}
