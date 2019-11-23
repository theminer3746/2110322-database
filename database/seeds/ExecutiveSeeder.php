<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ExecutiveSeeder extends Seeder
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
                'position' => 'executive',
                'ssn' => sprintf("%013d", rand(0, 9999999999999)),
                'employ_date' => $faker->date($format = 'Y-m-d', $max = 'now'), 
                'title' => $faker->title,
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'salary' => rand(50000, 200000),
                'contact' => $faker->e164PhoneNumber,
            ]);
        }

        $sales = DB::table('employees')->where('position', 'executive')->get();

        foreach($sales as $sale){
            DB::table('executives')->insert([
                'executive_ssn' => $sale->ssn,
                'executive_rank' => 'Manager',
            ]);
        }
    }
}
