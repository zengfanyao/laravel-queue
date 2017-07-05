<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Bus;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;
use App\Events\OrderShipped;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testOrderShipping()
    {
        Event::fake();
//        Event::assertDispatched(OrderShipped::class, function ($e) use ($order) {
//            return $e->order->id === $order->id;
//        });
        Event::assertNotDispatched(OrderFailedToShip::class);

    }
}
