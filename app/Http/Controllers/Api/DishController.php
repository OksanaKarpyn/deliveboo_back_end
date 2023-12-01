<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dish;

class DishController extends Controller
{
    public function index() {


        $dishes = Dish::all();

        $response = [
            "success" => true,
            "results" => $dishes
        ];

        return response()->json($response);

    }

}