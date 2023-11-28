<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Admin\Typology;
use App\Models\Admin\Restaurant;

class RestaurantTypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker): void
    {
        $tipologieId = Typology::all()->pluck('id');
        $ristoranti = Restaurant::all();

        foreach ($ristoranti as $ristorante) {
            $ristorante->typologies()->sync([$faker->randomElement($tipologieId), $faker->randomElement($tipologieId)]);
        }
    }
}
