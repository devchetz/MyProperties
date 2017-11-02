<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(PropertyStateSeeder::class);
        $this->call(PropertyTypeSeeder::class);
    }
}
