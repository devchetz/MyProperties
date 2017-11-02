<?php

use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_types')->insert([
        	['type' => 'Flat'],
        	['type' => 'Appartment'],
        	['type' => 'Bungalow'],
        	['type' => 'Chalet'],
        	['type' => 'Duplex'],
        	['type' => 'Country House'],
        	['type' => 'Self Contain'],
        	['type' => 'Villa'],
        	['type' => 'Residential Building'],
        	['type' => 'Hotel'],
        	['type' => 'Garage'],
        	['type' => 'Pent House'],
        	['type' => 'Land'],
        	['type' => 'Investment'],
        	['type' => 'Studio'],
        	['type' => 'Shop'],
        	['type' => 'Warehouse'],
        	['type' => 'Commercial Premesis']
        ]);
    }
}
