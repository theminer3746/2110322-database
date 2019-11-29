<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MarketingSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $executiveSsns = DB::table('employees')->where('position', 'executive')->pluck('ssn');

        for($i = 0; $i < 3; $i++){
            $promotionId = DB::table('marketing_schemes')->insertGetId([
                'executive_ssn' => $executiveSsns[rand(0, count($executiveSsns) - 1)],
                'start_time' => $faker->dateTimeBetween('-2 months', '+1 month'),
                'end_time' => $faker->dateTimeBetween('+1 month', '+3 month'),
                'type' => 'promotion',
                'promotion_detail' => $faker->paragraph(5),
            ]);

            for($j = 0; $j < rand(1, 2); $j++){
                DB::table('promotion_includes_product_relation')->insert([
                    'scheme_id' => $promotionId,
                    'product_id' => DB::table('products')->pluck('product_id')[rand(0, DB::table('products')->count() - 1)],
                ]);
            }
        }

        for($i = 0; $i < 10; $i++){
            $promotionId = DB::table('marketing_schemes')->insertGetId([
                'executive_ssn' => $executiveSsns[rand(0, count($executiveSsns) - 1)],
                'start_time' => $faker->dateTimeBetween('-2 months', '+1 month'),
                'end_time' => $faker->dateTimeBetween('+1 month', '+3 month'),
                'type' => 'advertisement',
                'advertisement_detail' => $faker->paragraph(5),
            ]);
        }
    }
}
