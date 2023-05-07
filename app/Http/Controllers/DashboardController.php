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
        // -> Approach with Eager Loading to fetch user and pet of each appointment

        if (Auth::user()->is_admin) // Citas del administrador (todas)
            $appointments = Appointment::with(['pet', 'user'])->get();

        else // Citas del usuario logeado
            $appointments = Appointment::where('user_id', Auth::user()->id)->with(['pet', 'user'])->get();

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
            // -> Approach without Eager Loading
            // $pet    = Pet::find($appointment->pet_id); N queries
            // $user   = User::find($appointment->user_id); N queries
            // So, 2N + 1 queries

            // -> Approach with Eager Loading
            $user = $appointment->user;
            $pet = $appointment->pet;
            // So, only 1 query since used with(['pet','user']) to prefetch $user and $pet

            $events[] = [
                'id'    =>  $appointment->id,
                'title' =>  "Cita con $user->name, mascota: $pet->name",
                'start' =>  $appointment->date,
                'url'   =>  route('appointment.show', $appointment),
                'status' =>  $appointment->status
            ];
        }

        return view('dashboard', ['appointments' => $events, 'pets' => $pets, 'clients' => $clients]);
    }
}
