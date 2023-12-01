<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dish;
use App\Models\Admin\Restaurant;
use App\Models\Admin\Typology;
use App\Models\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {


        // $restaurants = Restaurant::all();
        $restaurants = Restaurant::with('typologies','dishes')->get();

        $response = [
            "success" => true,
            "results" => $restaurants
        ];

        return response()->json($response);

    }
    public function user() {


        $user = User::all();

        $response = [
            "success" => true,
            "results" => $user
        ];

        return response()->json($response);

    }
    public function typologies() {


        $typologies = Typology::all();

        $response = [
            "success" => true,
            "results" => $typologies
        ];

        return response()->json($response);

    }
    public function dishes() {


        $dishes = Dish::all();

        $response = [
            "success" => true,
            "results" => $dishes
        ];

        return response()->json($response);

    }
}
