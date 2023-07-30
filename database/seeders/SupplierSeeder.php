<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) {
            Supplier::insert([
                'name' => $faker->name,
                'mobile_no' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'created_by' => 1,
                'created_at' => Carbon::now(),

            ]);
        }
    }
}
