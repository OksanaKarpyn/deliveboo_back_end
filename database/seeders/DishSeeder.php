<?php

namespace Database\Seeders;

use App\Models\Admin\Dish;
use App\Models\Admin\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all();
        $dishes = config('store.dbdishes');
        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->restaurant_id = rand(1,(count($restaurants)));
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->ingredients = implode(', ', $dish['ingredients']);
            $newDish->visible = $faker->numberBetween(0, 1);
            $newDish->price = $dish['price'];
            $newDish->save();
        }
    }
}
