<?php

use Illuminate\Database\Seeder;

class EverythingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Breeder::class, 10)->create();
        factory(App\Cart::class, 10)->create();
        factory(App\Comment::class, 10)->create();
        factory(App\Content::class, 10)->create();
        factory(App\Coupon::class, 10)->create();
        factory(App\Image::class, 10)->create();
        factory(App\Invoice::class, 10)->create();
        factory(App\Laboratory::class, 10)->create();
        factory(App\LabResult::class, 10)->create();
        factory(App\Manufacturer::class, 10)->create();
        factory(App\Order::class, 10)->create();
        factory(App\Product::class, 10)->create();
        factory(App\ProductCategory::class, 10)->create();
        // factory(App\Profile::class, 10)->create();
        factory(App\Shipment::class, 10)->create();
        factory(App\ShippingAddress::class, 10)->create();
        factory(App\ShippingCarrier::class, 10)->create();
        factory(App\User::class, 10)->create();
    }
}
