<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Pet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->is_admin) $pets = Pet::paginate(5);
        // else $pets = Pet::where('user_id', Auth::user()->id)->paginate(10);

        // 1 - Many relationship (User -> Pets)
        else $pets = User::find(Auth::user()->id)->pets()->paginate(5);
        return view('pet.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('pet.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $request)
    {
        $pet = Pet::create([
            'name'       => $request->input('name'),
            'species'    => $request->input('species'),
            'race'       => $request->input('race'),
            'dob'        => Carbon::parse($request->input('dob')),
            'color'      => $request->input('color'),
            'gender'     => $request->input('gender'),
            'sterilized' => $request->input('sterilized'),
            'weight'     => $request->input('weight'),
            'user_id'    => Auth::user()->id
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess("Mascota $pet->name añadida correctamente");

        return redirect()->route('pet.show', $pet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        // $user = User::find($pet->user_id);

        // 1 - Many relationship (User -> Pets)
        $user = $pet->user;
        return view('pet.show', compact('pet', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pet.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $pet->name       = $request->input('name');
        $pet->species    = $request->input('species');
        $pet->race       = $request->input('race');
        $pet->dob        = Carbon::parse($request->input('dob'));
        $pet->color      = $request->input('color');
        $pet->gender     = $request->input('gender');
        $pet->sterilized = $request->input('sterilized');
        $pet->weight     = $request->input('weight');

        $pet->save();

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addInfo("Mascota $pet->name actualizada");

        return redirect()->route('pet.show', $pet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addWarning("La mascota $pet->name ha sido eliminada.");

        return redirect('/pet');
    }
}
