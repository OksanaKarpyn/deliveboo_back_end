<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $typologies = $request->query('typologies');

        $query = Restaurant::with(['user', 'typologies', 'dishes']);

        if ($typologies) {
            $query->whereHas('typologies', function ($query) use ($typologies) {
                $query->whereIn('name', $typologies);
            });
        }

        $restaurants = $query->get();

        $response = [
            'success' => true,
            'results' => $restaurants,
        ];

        return response()->json($response);
    }

    public function  show($id){
        $restaurant = Restaurant::with(['user', 'typologies', 'dishes'])->find($id);
        return response()->json([
                'success' => true,
                'results' => $restaurant,
            ]);
    }
}