<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Restaurant;

use App\Models\Admin\Typology;

class TypologyController extends Controller
{
    public function index() {


        $typologies = Typology::all();

        $response = [
            "success" => true,
            "results" => $typologies
        ];

        return response()->json($response);

    }

}