<?php

use Illuminate\Database\Seeder;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserva')->insert([
            'hora' => time('H:i:s'),
            'fecha' => date('Y-m-d'),
        ]);
    }
}
