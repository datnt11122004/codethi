<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $cars = [];
        for ($i=0; $i<10; $i++) {
            $cars[] = [
                'car_model' => 'Car Model ' . $i,
                'car_image' => fake()->image(),
                'manufacturer' => 'Manufacturer ' . $i,
                'price' => 1000 * $i,
                'year' => 2022 + $i,
            ];
        }

        \App\Models\Cars::query()->insert($cars);
    }
}
