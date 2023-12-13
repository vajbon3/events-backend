<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Event::factory()->count(5)->older()->create();
        Event::factory()->count(5)->newer()->create();


        # test without filtering by date
        $response = $this->get('/api/events');
        $response->assertJsonCount(10, 'data');

        # test with filtering
        $response = $this->get('/api/events?start_date=2018-01-01');
        $response->assertJsonCount(5, 'data');

        $response = $this->get('/api/events?start_date=1997-12-31');
        $response->assertJsonCount(10, 'data');

        $response = $this->get('/api/events?start_date=1997-12-31&end_date=2017-12-31');
        $response->assertJsonCount(5, 'data');
    }
}
