<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Cliente;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // private array $generos = ['M', 'F'];
    // private array $emails  = ['@gmail.com', '@hotmail.com', '@outlook.com', '@alumnos.udg.mx', '@academicos.udg.mx', '@yahoo.com'];

    public function run(): void
    {
        // for($i = 0; $i < 20; ++$i){
        //     DB::table('clientes')->insert([
        //         'nombre'   => substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 10),
        //         'apellido' => substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 10),
        //         'genero'   => $this->generos[rand(0, sizeof($this->generos)-1)],
        //         'telefono' => strval(rand(1000000000, 9999999999)),
        //         'correo'   => Str::random(10) . $this->emails[rand(0, sizeof($this->emails)-1)]
        //     ]);
        // }
        Cliente::factory(20)->create();
    }
}
