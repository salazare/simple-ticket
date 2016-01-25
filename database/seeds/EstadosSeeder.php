<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'nombre' => 'Recibido',
        ]);

        DB::table('estados')->insert([
            'nombre' => 'Asignado',
        ]);

        DB::table('estados')->insert([
            'nombre' => 'Solucionado',
        ]);

    }
}
