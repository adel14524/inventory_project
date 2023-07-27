<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) {
            Unit::insert([
                'name' => $faker->name,
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
