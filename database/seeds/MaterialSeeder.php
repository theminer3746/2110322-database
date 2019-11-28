<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $allMaterialIds = [];

        for($i = 0; $i < 15; $i++){
            $allMaterialIds[] = DB::table('materials')->insertGetId([
                'name' => $faker->words(3, true),
                'amount' => rand(0, 5000),
            ]);
        }

        $productIds = DB::table('products')->pluck('product_id');

        foreach($productIds as $productId){
            $materialToBeUse = [];

            for($i = 0; $i < rand(1, 8); $i++){
                $materialToBeUse[] = rand(min($allMaterialIds), max($allMaterialIds));
            }

            $materialToBeUse = array_unique($materialToBeUse);

            foreach($materialToBeUse as $materialId){
                DB::table('products_has_meterials_relation')->insert([
                    'material_id' => $materialId,
                    'product_id' => $productId,
                    'amount' => rand(1, 7),
                ]);
            }


        }
    }
}
