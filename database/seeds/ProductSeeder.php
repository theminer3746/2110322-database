<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            DB::table('products')->insert([
                'price' => rand(1, 1000),
                'product_id' => $faker->regexify('/[A-Z0-9]{1,5}\-([A-Z0-9]{1,3}\-)?[A-Z0-9]{1,4}/'),
                'product_name' => $faker->words(3, true),
                'amount' => rand(0, 5000),
                'information' => $faker->paragraph(10, true),
            ]);
        }
    }
}
