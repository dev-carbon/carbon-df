<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 42; $i++) {
            Restaurant::create([
                'name' => fake()->company(),
                'owner_id' => DB::table('users')->inRandomOrder()->first()->id,
                'speciality_id' => DB::table('specialities')->inRandomOrder()->first()->id,
                'phone' => fake()->phoneNumber(),
                'street' => fake()->buildingNumber(),
                'postal_code' => fake()->numberBetween(1000, 10000),
                'city' => fake()->city(),
                'description' => fake()->paragraph(),
                'trending' => fake()->numberBetween(0, 1),
            ]);
        }
    }
}
