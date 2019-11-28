<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerSeeder::class);
        $this->call(SaleStaffSeeder::class);
        $this->call(ExecutiveSeeder::class);
        $this->call(ProductionStaffSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CustomerOrderAndInvoiceSeeder::class);
        $this->call(MaterialSeeder::class);
        //$this->call();
    }
}
