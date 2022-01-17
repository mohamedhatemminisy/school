<?php

namespace App\Listeners;

use App\Events\OrderFinish;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AssignOrderNumber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderFinish $event)
    {
        $this->updateOrderStatus($event->order);
    }

    function updateOrderStatus($order)
    {
        $order->status = 'completed';
        $order->save();
        $this->sendMail($order);
    }

    // send mail to admin to notify that order number x has been finished
    function sendMail($order)
    {
        Mail::send('emails.OrderNumber', ['order_id' =>  $order->id], function ($message)  use ($order) {
            $message->to('mohamed.hatem100100@gmail.com', 'School Admin')
                ->subject('Order Completed');
        });
    }
}
