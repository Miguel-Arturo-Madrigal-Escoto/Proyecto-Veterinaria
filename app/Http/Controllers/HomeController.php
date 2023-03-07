<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function create()
    {
        return view('home.signup');
    }

    public function signin_view()
    {
        return view('home.signin');
    }

    public function signin_cliente(Request $request)
    {
        /* Validación */
        $request->validate([
            'correo' => ['required', 'email', Rule::exists('clientes', 'correo')],
            'password' => ['required'],
        ]);

        // aqui continua el proceso de login del usuario
        dd('login del cliente. Autenticación pasada');
    }

    public function store(Request $request)
    {
        /* Validación */
        $request->validate([
            'nombre'   => ['required', 'string', 'min:3'],
            'apellido' => ['required', 'string', 'min:3'],
            'genero'   => ['required', 'string', 'size:1'],
            'telefono' => ['required', 'integer', 'digits:10', 'unique:clientes,telefono'],
            // 'correo'   => ['required', 'email', 'unique:clientes,correo'],
            'correo' => ['required', 'email','unique:App\Models\Cliente,correo'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->genero = $request->genero;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->password = Hash::make($request->password);
        $cliente->foto     = 'https://cdn-icons-png.flaticon.com/512/149/149071.png';
        $cliente->save();

        dd('cliente registrado');
    }
}
