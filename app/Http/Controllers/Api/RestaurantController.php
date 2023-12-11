<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
{
    $typology = $request->query('typologies');


    $query = Restaurant::with(['user', 'typologies', 'dishes']);
    
    
    if ($typology) {
        $query->whereHas('typologies', function ($query) use ($typology) {
            $query->where('name', $typology);
        });
    }
    $restaurants = $query->paginate(8);

    $response = [
        'success' => true,
        'results' => $restaurants,
    ];

    return response()->json($response);
}



}