<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $appointments = Appointment::all();
        return view('dashboard', compact('appointments'));
    }
}
