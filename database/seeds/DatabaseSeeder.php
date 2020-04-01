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
        factory(App\User::class, 10);
        factory(App\Breeder::class, 10);
        factory(App\Content::class, 10);
    }
}
