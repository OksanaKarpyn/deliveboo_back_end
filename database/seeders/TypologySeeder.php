<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Admin\Typology;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tipologie = [
            ["name" => "Ristorante"],
            ["name" => "Pizzeria"],
            ["name" => "Sushi"],
            ["name" => "Fast Food"],
            ["name" => "Poke"],
        ];


        foreach ($tipologie as $tipologia) {
            $newTypology = new Typology();
            $newTypology->name = $tipologia["name"];
            $newTypology->save();
        }
    }
}
