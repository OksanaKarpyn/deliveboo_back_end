<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Admin\Restaurant;
use App\Models\User;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker): void
    {
        $utenti = User::all();

        foreach ($utenti as $utente) {
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $utente->id;
            $newRestaurant->name = $faker->name();
            $newRestaurant->address = $faker->address();
            $newRestaurant->photo = 'null';
            $newRestaurant->piva = $faker->randomNumber(7, true);
            $newRestaurant->save();
        }
    }
}