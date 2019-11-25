<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CustomerOrderAndInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $customerId = DB::table('customers')->inRandomOrder()->value('customer_id');

            DB::table('customer_orders')->insert([
                'total_price' => null,
                'order_date' => $faker->date('Y-m-d', 'now'),
                'sale_staff_ssn' => DB::table('sale_staffs')->inRandomOrder()->value('sale_staff_ssn'),
                'customer_id' => $customerId,
                'address_id' => DB::table('customer_addresses')->where('customer_id', $customerId)->inRandomOrder()->value('address_id'),
            ]);

            $orderId = DB::table('customer_orders')->max('order_id');

            $total = 0;

            for ($j = 0; $j < rand(1, 12); $j++) {
                do {
                    $productId = DB::table('products')->inRandomOrder()->value('product_id');
                } while (DB::table('product_operate_on_customer_order_relation')
                    ->where('product_id', $productId)
                    ->where('order_id', $orderId)
                    ->exists()
                ); // To prevent duplicate product in the same order

                $productPrice = DB::table('products')->where('product_id', $productId)->value('price');
                $amount = rand(1, 50);

                DB::table('product_operate_on_customer_order_relation')->insert([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'amount' => $amount,
                ]);

                $total += $productPrice * $amount;
            }

            DB::table('customer_orders')->where('order_id', $orderId)->update([
                'total_price' => $total,
            ]);

            DB::table('invoices')->insert([
                'paid_at' => null,
                'additional_information' => null,
                'payment_method' => null,
                'customer_id' => $customerId,
                'address_id' => DB::table('customer_addresses')->where('customer_id', $customerId)->inRandomOrder()->value('address_id'),
                'order_id' => $orderId,
            ]);
        }
    }
}
