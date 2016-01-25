<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Software',
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Hardware',
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Login',
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Aplicación Web',
        ]);

    }
}
