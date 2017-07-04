<?php

namespace Tests\Feature;

use App\Events\OrderShipped;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
    public function testOrderShiping()
    {
        Event::fake();

        $user=\App\User::findOrFail(1);

        Event::assertDispatched(OrderShipped::class,function ($e)use($user){
            return $e->user->id==$user->id;
        });
        Event::assertNotDispatched(OrderFailedToShip::class);
    }
}
