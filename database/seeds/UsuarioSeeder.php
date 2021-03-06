<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Nayru',
            'email' => 'nayru@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Pablo',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
