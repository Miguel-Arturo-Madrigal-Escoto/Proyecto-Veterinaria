<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVaccineRequest;
use App\Http\Requests\UpdateVaccineRequest;
use App\Models\Pet;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vaccines = Vaccine::paginate(5);
        return view('vaccine.index', compact('vaccines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vaccine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVaccineRequest $request)
    {
        $vaccine = Vaccine::create($request->all());

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess("La vacuna $vaccine->title ha sido agregada.");

        return redirect()->route('vaccine.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaccine $vaccine)
    {
        return redirect()->route('vaccine.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaccine $vaccine)
    {
        return view('vaccine.edit', compact('vaccine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVaccineRequest $request, Vaccine $vaccine)
    {
        $vaccine->update($request->all());

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addInfo("La vacuna $vaccine->title ha sido actualizada.");

        return redirect()->route('vaccine.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addWarning("La vacuna $vaccine->title ha sido eliminada.");

        return redirect()->route('vaccine.index');
    }

    public function appliedVaccinesIndex(){
        $pets = Pet::all();

        return view('vaccine.applied-vaccines', compact('pets'));
    }

}
