<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        if ($request->_token) {
            $orders = $this->filter($params['status']);
        } else {
            $orders = Order::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        }
        return view('dashboard.orders.index', compact('orders'));
    }

    function filter($status)
    {
        $orders = Order::orderBy('id', 'desc');
        if ($status != "0") {
            $orders = $orders->where('status', $status);
        }
        return  $orders->paginate(PAGINATION_COUNT);
    }
}
