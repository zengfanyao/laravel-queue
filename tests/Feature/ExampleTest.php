<?php

namespace Tests\Feature;

<<<<<<< HEAD
use Illuminate\Support\Facades\Bus;
=======
use App\Events\OrderShipped;
use Illuminate\Support\Facades\Event;
>>>>>>> 11630b7ca5742e53cd9cc0364b79cc44e3e7e373
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
<<<<<<< HEAD
    public function testOrderShipping()
    {
        Event::fake();
//        Event::assertDispatched(OrderShipped::class, function ($e) use ($order) {
//            return $e->order->id === $order->id;
//        });
        Event::assertNotDispatched(OrderFailedToShip::class);

=======
    public function testOrderShiping()
    {
        Event::fake();

        $user=\App\User::findOrFail(1);

        Event::assertDispatched(OrderShipped::class,function ($e)use($user){
            return $e->user->id==$user->id;
        });
        Event::assertNotDispatched(OrderFailedToShip::class);
>>>>>>> 11630b7ca5742e53cd9cc0364b79cc44e3e7e373
    }
}
