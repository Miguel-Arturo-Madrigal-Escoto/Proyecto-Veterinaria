<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociatePetVaccineRequest;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Pet;
use App\Models\User;
use App\Models\Vaccine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    /*
        Controller for alerts
    */
    use AlertController;

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
            'user_id'    => Auth::user()->is_admin ? $request->user_id : Auth::user()->id
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()){
            // store pet photo
            PetPhotoController::store($request->file, $pet->id);
            $this->__alert__('success', "Mascota $pet->name añadida correctamente");
        }
        else {
            $this->__alert__('error', 'Error al guardar la imagen');
        }

        return redirect()->route('pet.show', $pet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        // Policies
        // $this->authorize('view', $pet);
        $response = Gate::inspect('view', $pet);

        if ($response->allowed()){
            // 1 - Many relationship (User -> Pets)
            $user  = $pet->user;
            return view('pet.show', compact('pet', 'user'));
        }

        $this->__alert__('error', $response->message());
        abort($response->status());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        // Policies
        $response = Gate::inspect('update', $pet);

        if ($response->allowed())
            return view('pet.edit', compact('pet'));

        $this->__alert__('error', $response->message());
        abort($response->status());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        // Policies
        $response = Gate::inspect('update', $pet);

        if ($response->allowed()){
            $pet->name       = $request->input('name');
            $pet->species    = $request->input('species');
            $pet->race       = $request->input('race');
            $pet->dob        = Carbon::parse($request->input('dob'));
            $pet->color      = $request->input('color');
            $pet->gender     = $request->input('gender');
            $pet->sterilized = $request->input('sterilized');
            $pet->weight     = $request->input('weight');
            $pet->save();

            if ($request->hasFile('file') && $request->file('file')->isValid()){
                // update pet photo
                PetPhotoController::update($request->file, $pet->id);
                $this->__alert__('info', "Imagen actualizada para $pet->name");
            }

            $this->__alert__('success', "Mascota $pet->name actualizada");

            return redirect()->route('pet.show', $pet);
        }

        $this->__alert__('error', $response->message());
        abort($response->status());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        // Policies
        $response = Gate::inspect('delete', $pet);

        if ($response->allowed()){
            $pet->delete();

            $this->__alert__('warning', "La mascota $pet->name ha sido eliminada.");

            return redirect('/pet');
        }
        $this->__alert__('error', $response->message());
        abort($response->status());
    }

    /**
     * Custom: apply vaccine to pet
     */
    public function applyVaccineIndex(){
        // Policy
        $response = Gate::inspect('viewAny');

        if ($response->denied()) {
            $this->__alert__('error', $response->message());
            abort($response->status());
        }

        $pets     = Pet::all();
        $vaccines = Vaccine::all();

        return view('vaccine.apply-vaccine', compact('pets', 'vaccines'));
    }

    /**
     * Custom: assign vaccine to pet into pivot table
     */
    public function applyVaccineStore(AssociatePetVaccineRequest $request){
        $pet = Pet::find($request->pet_id);

        // Insert Many to Many row to pivot table with additional fields on: []
        $pet->vaccines()->attach($request->vaccine_ids, ['date' => now()]);

        $this->__alert__('info', "Se han aplicado " . count($request->vaccine_ids) . " vacuna(s) a la mascota $pet->name");

        // redirect to
        return redirect()->route('vaccine.index');
    }



}
