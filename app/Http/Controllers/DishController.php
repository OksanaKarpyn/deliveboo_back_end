<?php

namespace App\Http\Controllers;

use App\Models\Admin\Dish;
use App\Models\Admin\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDishRequest;

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
        return view('admin.dish.index', compact('restaurant', 'dishes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
<<<<<<< HEAD
        $dishes = Dish::All();
        $restaurantes = Restaurant::All();

        return view('admin.dish_create');
=======
        
        return view('admin.dish.create');
>>>>>>> ae6a4c81ef86ea2e2495cddbbdedb7744e122d91
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
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
=======
    public function store(StoreDishRequest $request)
    {
        $validated_data = $request->validated();

        $new_dish = new Dish();

        $validated_data['restaurant_id'] = Auth::user()->id;

        $validated_data['visible'] = $request->input('visible', 0);
        
        $new_dish->fill($validated_data);
        $new_dish->save();

        return redirect()->route('dishes.index');
>>>>>>> ae6a4c81ef86ea2e2495cddbbdedb7744e122d91
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
    public function edit($id)
    {
        $dish = Dish::find($id);
        return view('admin.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDishRequest $request, $id)
    {
        $validated_data = $request->validated();

        // $validated_data['restaurant_id'] = Auth::user()->id;

        // $validated_data['visible'] = $request->input('visible', 0);
        
        // $new_dish->fill($validated_data);
        // $new_dish->save();

        return redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $dish = Dish::find($id);
        $dish->delete();
        return redirect()->route('dishes.index');
    }
}