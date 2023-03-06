<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Validación */
        $request->validate([
            'nombre' => ['required', 'string', 'min:3'],
            'apellido' => ['required', 'string', 'min:3'],
            'genero' => ['required', 'string', 'size:1'],
            'telefono' => ['required', 'integer', 'digits:10'],
            'correo' => ['required', 'email:rfc,dns'],
        ]);

        /* Instancia del modelo y guardado */
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->genero = $request->genero;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->save();

        // Alert::success('Éxito'   , "El cliente $cliente->nombre $cliente->apellido fue registrado.");
        /* Redireccionamiento */
        return redirect('/cliente')->with(['user_added' => $cliente]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3'],
            'apellido' => ['required', 'string', 'min:3'],
            'genero' => ['required', 'string', 'size:1'],
            'telefono' => ['required', 'integer', 'digits:10'],
            'correo' => ['required', 'email:rfc,dns'],
        ]);

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->genero = $request->genero;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->save();

        return redirect('/cliente/' . $cliente->id)->with(['user_updated' => $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect('/cliente')->with(['user_deleted' => $cliente]);
    }
}
