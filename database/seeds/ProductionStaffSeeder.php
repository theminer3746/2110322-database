<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductionStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            DB::table('employees')->insert([
                'position' => 'production_staff',
                'ssn' => sprintf("%013d", rand(0, 9999999999999)),
                'employ_date' => $faker->date($format = 'Y-m-d', $max = 'now'), 
                'title' => $faker->title,
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'salary' => rand(20000, 80000),
                'contact' => $faker->e164PhoneNumber,
            ]);
        }

        $productions = DB::table('employees')->where('position', 'production_staff')->get();

        foreach($productions as $production){
            DB::table('production_staffs')->insert([
                'production_staff_ssn' => $production->ssn,
            ]);
        }
    }
}
