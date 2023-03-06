<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $especies = ['perro', 'gato', 'tortuga', 'pez', 'conejo', 'puerco', 'otro'];
    private array $generos  = ['M', 'H'];

    public function run(): void
    {
        for($i = 0; $i < 20; ++$i){
            DB::table('mascotas')->insert([
                'nombre'       => substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 8),
                'fecha_nac'    => Carbon::now()->subDays(rand(1, 4380)),
                'especie'      => $this->especies[rand(0,sizeof($this->especies)-1)],
                'raza'         => substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 6),
                'color'        => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                'genero'       => $this->generos[rand(0, sizeof($this->generos)-1)],
                'esterilizado' => rand(0, 1) === 1,
                'peso'         => rand(10, 100) / 10.0,
                'cliente_id'   => Cliente::all()->random()->id
            ]);
        }
    }
}
