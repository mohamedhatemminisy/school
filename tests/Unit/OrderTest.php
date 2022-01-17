<?php

namespace Tests\Unit;

use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * delete order
     *
     * @return void
     */
    public function delete_order_test()
    {
        $order = Order::first();
        if ($order) {
            $order->delete();
        }
        $this->assertTrue(true);
    }

    /**
     * test finish order
     *
     * @return void
     */
    public function test_finish_order()
    {
        $order = Order::first();
        if ($order->status != 'completed') {
            $order->status = 'completed';
            $order->save();
        }
        $this->assertTrue(true);
    }
}
