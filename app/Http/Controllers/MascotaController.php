<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use App\Http\Requests\UpdateMascotaRequest;
use App\Models\Cliente;
use App\Models\Mascota;
use Carbon\Carbon;

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
    public function store(StoreMascotaRequest $request)
    {
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
    public function update(UpdateMascotaRequest $request, Mascota $mascota)
    {
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
        $mascota->delete();

        return redirect('/mascota')->with(['mascota_deleted' => $mascota]);
    }
}
