<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mascota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Database\Query\Builder;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascota::paginate(10);
        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('mascotas.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'alpha'],
            'especie' => ['required', 'string', Rule::notIn(['Elige una opción']), 'alpha'],
            'raza' => ['required', 'string', 'alpha'],
            'fecha_nac' => ['required', 'string', 'date', 'before_or_equal:today'],
            'color' => ['required', 'string'],
            'genero' => ['required', 'string', 'size:1', Rule::in(['M', 'H'])],    // char
            'esterilizado' => ['required', 'boolean', Rule::in(['1', '0'])],
            'peso' => ['required', 'numeric'],
            'foto' => ['required', 'string'],
            'cliente_id' => ['required', Rule::notIn(['Elige una opción']) , 'exists:App\Models\Cliente,id'],
            // 'cliente_id' => ['required', Rule::notIn(['Elige una opción']) , Rule::exists('clientes')->where(function (Builder $query) {
            //     return $query->where('id', intval($request->cliente_id  ));
            // }),
            // ],
        ]);

        $mascota = new Mascota();
        $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->fecha_nac = Carbon::parse($request->fecha_nac)->format('Y-m-d');
        $mascota->color = $request->color;
        $mascota->genero = $request->genero;
        $mascota->esterilizado = $request->esterilizado;
        $mascota->peso = $request->peso;
        // $mascota->foto = $request->foto; // pendiente
        $mascota->cliente_id = $request->cliente_id;

        $mascota->save();

        return redirect('/mascota')->with(['mascota_added' => $mascota]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', ['mascota' => $mascota]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        $clientes = Cliente::all();
        $owner  = Cliente::find($mascota->cliente_id);

        return view('mascotas.edit', compact('mascota', 'clientes', 'owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'alpha'],
            'especie' => ['required', 'string', Rule::notIn(['Elige una opción']), 'alpha'],
            'raza' => ['required', 'string', 'alpha'],
            'fecha_nac' => ['required', 'string', 'date', 'before_or_equal:today'],
            'color' => ['required', 'string'],
            'genero' => ['required', 'string', 'size:1', Rule::in(['M', 'H'])],    // char
            'esterilizado' => ['required', 'boolean', Rule::in(['1', '0'])],
            'peso' => ['required', 'numeric'],
            'foto' => ['required', 'string'],
            'cliente_id' => ['required', Rule::notIn(['Elige una opción']) , 'exists:App\Models\Cliente,id'],
            // 'cliente_id' => ['required', Rule::notIn(['Elige una opción']) , Rule::exists('clientes')->where(function (Builder $query) {
            //     return $query->where('id', intval($request->cliente_id  ));
            // }),
            // ],
        ]);

        $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->fecha_nac = Carbon::parse($request->fecha_nac)->format('Y-m-d');
        $mascota->color = $request->color;
        $mascota->genero = $request->genero;
        $mascota->esterilizado = $request->esterilizado;
        $mascota->peso = $request->peso;
        // $mascota->foto = $request->foto; // pendiente
        $mascota->cliente_id = $request->cliente_id;

        $mascota->save();

        return redirect('/mascota/' . $mascota->id)->with(['mascota_updated' => $mascota]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        //
    }
}
