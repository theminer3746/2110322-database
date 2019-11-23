<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $customer_count = 3;
        $address_count = 5;

        for($i = 0; $i < $customer_count; $i++){
            DB::table('customers')->insert([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'title' => $faker->title,
                'contact' => $faker->phoneNumber,
            ]);
        }

        for($i = 0; $i < $address_count; $i++){
            DB::table('customer_addresses')->insert([
                'customer_id' => rand(1, $customer_count - 1),
                'line_1' => $faker->streetAddress,
                'line_2' => null,
                'city' => $faker->city,
                'country' => $faker->countryISOAlpha3,
                'postal_code' => $faker->postcode,
            ]);
        }
    }
}
