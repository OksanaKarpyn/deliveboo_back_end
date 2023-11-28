<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Admin\Dish;
use App\Models\Admin\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker):void
    {
        for ($i = 1; $i <= 10; $i++){
            $newOrder = new Order();
            $newOrder->name = $faker->firstname();
            $newOrder->lastname = $faker->lastname();
            $newOrder->address = $faker->address();
            $newOrder->phone = $faker->phoneNumber();
            $newOrder->status = $faker->boolean();
            $newOrder->totalprice = $faker->randomFloat(1,10,20);
            $newOrder->save();
        }
    }
}