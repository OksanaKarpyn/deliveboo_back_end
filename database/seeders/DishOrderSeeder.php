<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Admin\Dish;
use App\Models\Admin\Order;
class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $piattiId = Dish::all()->pluck('id');
        $ordini = Order::all();
    
        foreach ($ordini as $ordine) {
            $piatti = [$faker->randomElement($piattiId), $faker->randomElement($piattiId)];
            $ordine->dishes()->sync($piatti);
            
            // Assegna un valore a 'quantity' durante la creazione del record
            $ordine->dishes()->updateExistingPivot($piatti[0], ['quantity' => $faker->numberBetween(0, 10)]);
            $ordine->dishes()->updateExistingPivot($piatti[1], ['quantity' => $faker->numberBetween(0, 10)]);
        }
    }
}