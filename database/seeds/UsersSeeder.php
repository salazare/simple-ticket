<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'type' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Operador',
            'email' => 'operador@admin.com',
            'password' => bcrypt('operador'),
            'type' => 'operador',
        ]);

        DB::table('users')->insert([
            'name' => 'Edder',
            'email' => 'salazaredder@gmail.com',
            'password' => bcrypt('usuario'),
            'type' => 'user',
        ]);

    }
}
