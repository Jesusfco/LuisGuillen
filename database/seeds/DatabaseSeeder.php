<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => "Jesús Fco Cortés",
            'email' => 'jfcr@live.com',
            'phone'=> '9611221222',
            'user_type' => 10,
            'password' => bcrypt('oaxaca2015'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('users')->insert([
            'name' => "Luis Guillén",
            'email' => 'mentecambiante@gmail.com',
            'phone'=> '9611221222',
            'user_type' => 10,
            'password' => bcrypt('hipnosis2018'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
