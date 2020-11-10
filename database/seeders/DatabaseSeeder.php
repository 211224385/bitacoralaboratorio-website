<?php

namespace Database\Seeders;

use App\Models\User;
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
    	User::create([
    'name' => 'Administrador',
    'paternal_surname' => 'Cuvalles',
    'maternal_surname' => 'UdG',
    'email' => 'admin@cuvalles.udg',
    'password' => bcrypt('123456789'),
    'code' => 'admin',
    'role_id' => User::ADMIN,
     ]);
        

        // \App\Models\User::factory(10)->create();
    }
}
