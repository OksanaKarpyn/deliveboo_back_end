<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('user', 'typologies', 'dishes')->get();

        $response = [
            "success" => true,
            "results" => $restaurants
        ];

        return response()->json($response);
    }


}