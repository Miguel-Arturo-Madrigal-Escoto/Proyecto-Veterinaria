<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('appointment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::where('user_id', Auth::user()->id)->get();
        return view('appointment.create', compact('pets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        Appointment::create([
            'date'    => Carbon::parse($request->date),
            'reason'  => $request->reason,
            'pet_id'  => $request->pet_id,
            'user_id' => Auth::user()->id
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addInfo("Cita creada correctamente. Por favor espere a que sea confirmada");

        return view('appointment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
