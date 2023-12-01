<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Restaurant;
use App\Models\Admin\Order;

class RestaurantController extends Controller
{
    public function index() {


        $orders = Order::all();

        $response = [
            "success" => true,
            "results" => $orders
        ];

        return response()->json($response);

    }

}