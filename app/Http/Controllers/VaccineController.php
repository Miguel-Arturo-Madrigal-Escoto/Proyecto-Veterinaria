<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVaccineRequest;
use App\Http\Requests\UpdateVaccineRequest;
use App\Models\Pet;
use App\Models\Vaccine;
use App\Policies\VaccinePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VaccineController extends Controller
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
        // Policy
        $response = Gate::inspect('viewAny', Vaccine::class);

        if ($response->allowed()) {
            $vaccines = Vaccine::paginate(5);
            return view('vaccine.index', compact('vaccines'));
        }

        $this->__alert__('error', $response->message());
        abort($response->status());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Policy
        $response = Gate::inspect('viewAny', Vaccine::class);

        if ($response->denied()) {
            $this->__alert__('error', $response->message());
            abort($response->status());
        }

        return view('vaccine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVaccineRequest $request)
    {
        // Policy
        $response = Gate::inspect('viewAny', Vaccine::class);

        if ($response->denied()) {
            $this->__alert__('error', $response->message());
            abort($response->status());
        }

        $vaccine = Vaccine::create($request->all());

        $this->__alert__('success', "La vacuna $vaccine->title ha sido agregada.");

        return redirect()->route('vaccine.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaccine $vaccine)
    {
        // Policy
        $response = Gate::inspect('view', $vaccine);
        abort($response->status());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaccine $vaccine)
    {
        // Policy
        $response = Gate::inspect('update', $vaccine);

        if ($response->denied()) {
            $this->__alert__('error', $response->message());
            abort($response->status());
        }

        return view('vaccine.edit', compact('vaccine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVaccineRequest $request, Vaccine $vaccine)
    {
        // Policy
        $response = Gate::inspect('update', $vaccine);

        if ($response->denied()) {
            $this->__alert__('error', $response->message());
            abort($response->status());
        }

        $vaccine->update($request->all());

        $this->__alert__('info', "La vacuna $vaccine->title ha sido actualizada.");

        return redirect()->route('vaccine.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaccine $vaccine)
    {
        // Policy
        $response = Gate::inspect('delete', $vaccine);

        if ($response->denied()) {
            $this->__alert__('error', $response->message());
            abort($response->status());
        }

        $vaccine->delete();

        $this->__alert__('warning', "La vacuna $vaccine->title ha sido eliminada.");

        return redirect()->route('vaccine.index');
    }

    public function appliedVaccinesIndex(){
        // Policy
        $response = Gate::inspect('create');

        // if ($response->denied()) {
        //     $this->__alert__('error', $response->message());
        //     abort($response->status());
        // }

        $pets = Pet::all();

        return view('vaccine.applied-vaccines', compact('pets'));
    }

}
