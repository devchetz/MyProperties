<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        	"name" => "Dev Chetz",
        	"email" => "test@test.com",
            "super_admin" => true,
        	"phone" => "09091230000",
        	"password" => bcrypt('test123')
        	]
        ]);
    }
}
