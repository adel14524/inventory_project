<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) {
            Customer::insert([
                'name' => $faker->name,
                'mobile_no' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'customer_image' => $faker->image('public/upload/customer',640,480, null, false),
                'updated_by' => 1,
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
