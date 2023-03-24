<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Citas del usuario logeado
        $appointments = Appointment::where('user_id', Auth::user()->id)->get();
        $pets = [
            'dog' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'dog']
            ])->count(),
            'cat' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'cat']
            ])->count(),
            'bird' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'bird']
            ])->count(),
            'fish' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'fish']
            ])->count(),
            'frog' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'frog']
            ])->count(),
            'pig' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'pig']
            ])->count(),
            'horse' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'horse']
            ])->count(),
            'cow' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'cow']
            ])->count(),
            'other' => Pet::where([
                ['user_id', Auth::user()->id],
                ['species', 'other']
            ])->count(),
        ];

        // Full Calendar Events
        $events = [];
        foreach($appointments as $appointment){
            $pet    = Pet::find($appointment->pet_id);
            // $user   = User::find($appointment->user_id);

            $events[] = [
                'id'    =>  $appointment->id,
                'title' => "Cita con $pet->name",
                'start' =>  $appointment->date,
                'url'   =>  route('appointment.show', $appointment),
                'status' =>  $appointment->status
            ];
        }

        return view('dashboard', ['appointments' => $events, 'pets' => $pets]);
    }
}
