<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\User;
use App\Models\Admin\Restaurant;
use App\Models\Admin\Dish;
use App\Models\Admin\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Ottieni l'ID dell'utente loggato
        $userId = auth()->user()->id;

        // Ottieni l'ID del ristorante associato all'utente loggato
        $restaurantId = Restaurant::where('user_id', $userId)->value('id');

        // Ottieni gli ordini solo per il ristorante loggato
        $orders = Order::whereHas('dishes', function ($query) use ($restaurantId) {
            $query->where('restaurant_id', $restaurantId);
        })->get();

        // Ottieni i piatti solo per il ristorante loggato
        $dishes = Dish::where('restaurant_id', $restaurantId)->get();

        // Inizializza il totale a zero
        $total = 0;

        // Itera attraverso gli ordini e calcola il totale
        foreach ($orders as $order) {
            foreach ($order->dishes as $dish) {
                // Calcola il totale per ogni piatto
                $total += $dish->price * $dish->pivot->quantity;
            }
        };

        // Ottieni il ristorante loggato
        $restaurant = Restaurant::find($restaurantId);

        // Esegui la vista passando i dati necessari
        return view('Admin.order.index', compact('restaurant', 'orders', 'dishes', 'total'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // Logica per salvare l'ordine

        // Calcola la somma dei prezzi dei piatti
        $orderTotalPrice = $this->calculateOrderTotalPrice($request->dishes);

        // Salva l'ordine con il totale calcolato
        $order = new Order;
        $order->totalprice = $orderTotalPrice;
        $order->save();

        // ... Altre operazioni

        return redirect()->route('orders.index')->compact('orderTotalPrice');
    }

    private function calculateOrderTotalPrice($dishes)
    {
        $totalPrice = 0;

        // Logica per calcolare la somma dei prezzi dei piatti
        foreach ($dishes as $dish) {
            // Assicurati che $dish sia un modello Dish con una relazione many-to-many
            $totalPrice += $dish->price * $dish->pivot->quantity;
        }

        return $totalPrice;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}