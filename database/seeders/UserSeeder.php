<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 20; $i++) {
            $newUser = new User();
            $newUser->name = $faker->unique()->firstName;
            $newUser->email = $faker->unique()->email;
            $newUser->password = Hash::make('password');
            $newUser->save();
        }
    }
}
