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
        $customer_count = 30;
        $minAddressCount = 0;
        $maxAddressCount = 7;

        for($i = 0; $i < $customer_count; $i++){
            DB::table('customers')->insert([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'title' => $faker->title,
                'contact' => $faker->phoneNumber,
            ]);

            $customerId = DB::table('customers')->max('customer_id');

            for($j = 0; $j < rand($minAddressCount, $maxAddressCount); $j++){
                DB::table('customer_addresses')->insert([
                    'customer_id' => $customerId,
                    'line_1' => $faker->streetAddress,
                    'line_2' => null,
                    'city' => $faker->city,
                    'country' => $faker->countryISOAlpha3,
                    'postal_code' => $faker->postcode,
                ]);
            }
        }
    }
}
