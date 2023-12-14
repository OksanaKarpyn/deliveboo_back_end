<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dish;
use App\Models\Admin\Restaurant;
use App\Models\Admin\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {


        $orders = Order::all();

        $response = [
            "success" => true,
            "results" => $orders
        ];

        return response()->json($response);
    }

    public function create(Request $request)
    {
        $dishes = $request->input("dishes");
        $data = $request->input("data");

        $totalPrice = 0;
        $newOrder = new Order();

        foreach ($dishes as $dish) {
            $dishFromDB = Dish::findOrFail($dish["id"]);
            $totalPrice += $dishFromDB->price * $dish["quantity"];
        }
        $newOrder->totalprice = $totalPrice;
        $newOrder->fill($data);
        $newOrder->save();

        foreach ($dishes as $dish) {
            // Supponiamo che il campo 'quantity' sia presente nella richiesta per ogni prodotto
            $quantity = $dish['quantity'];
            $newOrder->dishes()->attach([$dish['id'] => ['quantity' => $quantity]]);
        }
        $newOrder = Order::with('dishes')->findOrFail($newOrder->id);

        $data = [
            "order" => $newOrder
        ];


        // Puoi anche restituire una risposta JSON o un messaggio di successo
        return response()->json($data, 200);
    }
}
