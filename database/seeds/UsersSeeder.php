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
            'name' => 'Operador1',
            'email' => 'operador1@admin.com',
            'password' => bcrypt('operador'),
            'type' => 'operador',
        ]);

        DB::table('users')->insert([
            'name' => 'Operador2',
            'email' => 'operador2@admin.com',
            'password' => bcrypt('operador'),
            'type' => 'operador',
        ]);

        DB::table('users')->insert([
            'name' => 'Operador3',
            'email' => 'operador3@admin.com',
            'password' => bcrypt('operador'),
            'type' => 'operador',
        ]);

        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@user.com',
            'password' => bcrypt('usuario'),
            'type' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'User2',
            'email' => 'user2@user.com',
            'password' => bcrypt('usuario'),
            'type' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'User3',
            'email' => 'user3@user.com',
            'password' => bcrypt('usuario'),
            'type' => 'user',
        ]);

    }
}
