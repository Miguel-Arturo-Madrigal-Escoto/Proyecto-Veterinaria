<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInClienteRequest;
use App\Http\Requests\StoreClienteRequest;
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

    public function signin_cliente(SignInClienteRequest $request)
    {

        // aqui continua el proceso de login del usuario
        dd('login del cliente. Autenticación pasada');
    }

    public function store(StoreClienteRequest $request)
    {
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
