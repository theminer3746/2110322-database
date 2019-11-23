<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SaleStaffSeeder extends Seeder
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
                'position' => 'sales',
                'ssn' => sprintf("%013d", rand(0, 9999999999999)),
                'employ_date' => $faker->date($format = 'Y-m-d', $max = 'now'), 
                'title' => $faker->title,
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'salary' => rand(12000, 100000),
                'contact' => $faker->e164PhoneNumber,
            ]);
        }

        $sales = DB::table('employees')->where('position', 'sales')->get();

        foreach($sales as $sale){
            DB::table('sale_staffs')->insert([
                'sale_staff_ssn' => $sale->ssn,
                'sales_amount' => rand(0, 10000000),
            ]);
        }
    }
}
