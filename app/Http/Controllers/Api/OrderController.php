<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderFinish;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\Api\StatusCollection;

class OrderController extends Controller
{
    /**
     * Update Order status to be finished 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function finishOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        if ($order) {
            if ($order->status == 'completed')
                return (new StatusCollection(false, trans('api.order_finished')))->response()->setStatusCode(404);
            else
                // fire OrderFinish event to update order status
                event(new OrderFinish($order));
            return (new StatusCollection(true, trans('api.order_Updated')))->response()->setStatusCode(200);
        } else {
            return (new StatusCollection(false, trans('api.no_order')))->response()->setStatusCode(404);
        }
    }
}
