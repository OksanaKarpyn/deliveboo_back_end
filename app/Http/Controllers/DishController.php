<?php

namespace App\Http\Controllers;

use App\Models\Admin\Dish;
use App\Models\Admin\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDishRequest;
use Illuminate\Support\Facades\Storage;

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
        
        return view('admin.dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $validated_data = $request->validated();
        
        if($request->hasFile('photo')){
            $path_img = Storage::disk('public')->put('folderPhoto', $request->photo);
            $validated_data['photo'] = $path_img;
            // dd($path_img);
            
        }

        $new_dish = new Dish();
        
        $validated_data['restaurant_id'] = Auth::user()->restaurant->id;
    
        $validated_data['visible'] = $request->input('visible', 0);
        
        $new_dish->fill($validated_data);
        $new_dish->save();

        return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleDish = Dish::findOrFail($id);
        return view('admin.dish.show', compact('singleDish'));
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
    public function update(StoreDishRequest $request, Dish $dish)
    {
        $validated_data = $request->validated();

        $validated_data['restaurant_id'] = Auth::user()->id;

        $validated_data['visible'] = $request->input('visible', 0);
        
        $dish->fill($validated_data);
        $dish->update();

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