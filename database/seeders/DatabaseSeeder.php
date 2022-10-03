<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
        ]);
        Product::factory(1000)->create();
        $orders = Order::factory(100)->create();


        $orders->each(function ($order) {
            $maxProduct = rand(1, 50);
            $finalArr = [];

            for ($i = 0; $i < $maxProduct; $i++) {
                array_push($finalArr, rand(1, 1000));
            }

            $order->products()->attach(
                $finalArr
            );
        });
    }
}
