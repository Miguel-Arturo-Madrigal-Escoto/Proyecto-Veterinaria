<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Citas del usuario logeado
        if (Auth::user()->is_admin)
            $appointments = Appointment::all();
        // Citas del administrador (todas)
        else
            $appointments = Appointment::where('user_id', Auth::user()->id)->get();

        $clients = User::where('is_admin', false)->get();

        $pets = [
            'dog' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'dog']
            ])->count(),
            'cat' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'cat']
            ])->count(),
            'bird' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'bird']
            ])->count(),
            'fish' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'fish']
            ])->count(),
            'frog' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'frog']
            ])->count(),
            'pig' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'pig']
            ])->count(),
            'horse' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'horse']
            ])->count(),
            'cow' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'cow']
            ])->count(),
            'other' => Pet::where([
                (Auth::user()->is_admin)? ['user_id', '>', 0] : ['user_id', Auth::user()->id],
                ['species', 'other']
            ])->count(),
        ];

        // Full Calendar Events
        $events = [];
        foreach($appointments as $appointment){
            $pet    = Pet::find($appointment->pet_id);
            $user   = User::find($appointment->user_id);

            $events[] = [
                'id'    =>  $appointment->id,
                'title' => (Auth::user()->is_admin)? "Cita con $user->name, mascota: $pet->name" : "Cita con $pet->name",
                'start' =>  $appointment->date,
                'url'   =>  route('appointment.show', $appointment),
                'status' =>  $appointment->status
            ];
        }

        return view('dashboard', ['appointments' => $events, 'pets' => $pets, 'clients' => $clients]);
    }
}
