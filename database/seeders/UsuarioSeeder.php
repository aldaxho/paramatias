<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombres' => 'Sergio David',
            'ci' => '123',
            'apellido_paterno' => 'Cambara',
            'apellido_materno' => 'Dorbigny',
            'sexo' => 'Masculino',
            'telefono' => '74921968',
            'direccion' => 'Urb el Urubo',

            'email' => 'adm@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
