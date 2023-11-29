<?php

namespace App\Http\Controllers;

use App\Models\Admin\Dish;
use App\Models\Admin\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $restaurant = Restaurant::where('user_id', $userId)->first();
        $dishes = Dish::where('restaurant_id', $restaurant->id)->get();
        return view('admin.dish_index', compact('restaurant', 'dishes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $dishes = Dish::All();
        $restaurantes = Restaurant::All();

        return view('admin.dish_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurant $restaurant)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredientes' => 'required',
            'visible' => 'required',
            'price' => 'required',
        ]);
    
        $validatedData['visible'] = $request->input('visible');
        
        Dish::create([
            'restaurant_id' => $restaurant->id,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'ingredientes' => $validatedData['ingredientes'],
            'visible' => $validatedData['visible'],
            'price' => $validatedData['price'],
        ]);

        return redirect()->route('dish.index', ['restaurant' => $restaurant->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
