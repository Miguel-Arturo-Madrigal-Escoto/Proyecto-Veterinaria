<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Mail\AppointmentCancelled;
use App\Mail\TestMailable;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /*
        Controller for alerts
    */
    use AlertController;

    /*
        Controller for PDFs
    */
    use PDFController;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::forUser(Auth::user())->allows('show-all-appointments')) $appointments = Appointment::paginate(5);
        // else $appointments = Appointment::where('user_id', Auth::user()->id)->paginate(5);

        // 1 - Many relationship (User -> Appointments)
        else $appointments = User::find(Auth::user()->id)->appointments()->paginate(5);
        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $pets = Pet::where('user_id', Auth::user()->id)->get();

        // 1 - Many relationship (User -> Pets)
        if (Gate::allows('retrieve-all-pets'))
            $pets = Pet::all();
        else
            $pets = User::find(Auth::user()->id)->pets()->get();
        return view('appointment.create', compact('pets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $hours = Carbon::parse($request->hour)->format('H');
        $minutes = Carbon::parse($request->hour)->format('i');
        $appointment_date = Carbon::parse($request->date)->addHours($hours)->addMinutes($minutes);

        $user = Pet::find($request->pet_id)->user;

        $appointment = Appointment::create([
            'date'    => $appointment_date,
            'reason'  => $request->reason,
            'pet_id'  => $request->pet_id,
            'user_id' => $user->id
        ]);

        $this->__alert__('info', "Cita creada correctamente. Por favor espere a que sea confirmada");

        return redirect()->route('appointment.show', $appointment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        // $pet = Pet::find($appointment->pet_id);
        // $user = User::find($appointment->user_id);

        $response = Gate::inspect('show-appointment', $appointment);

        if ($response->allowed()){
            // 1 - Many relationship (Appointment -> Pet)
            $pet = $appointment->pet;
            // 1 - Many relationship (Appointment -> User)
            $user = $appointment->user;

            return view('appointment.show', compact('appointment', 'pet', 'user'));
        }

        $this->__alert__('error', $response->message());
        abort($response->status());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        // $pets = Pet::where('user_id', Auth::user()->id)->get();

        $response = Gate::inspect('update-appointment', $appointment);
        $authorized = Gate::inspect('edit-appointment-not-finished', $appointment);

        if ($authorized->denied()){
            $this->__alert__('error', 'No puedes editar una cita concluida');
            abort(403);
        }

        if ($response->allowed()){
            $pets = User::find(Auth::user()->id)->pets()->get();
            return view('appointment.edit', compact('appointment', 'pets'));
        }

        $this->__alert__('error', $response->message());
        abort($response->status());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        // edit only if the appointment is not marked as finished
        $response = Gate::inspect('edit-appointment-not-finished', $appointment);

        if ($response->denied()){
            $this->__alert__('error', 'No puedes editar una cita concluida');
            abort(403);
        }

        if (Auth::user()->is_admin){
            $appointment->cost = $request->cost;
            $appointment->status = $request->status;
            $appointment->paid = $request->paid;

            // if appointment is confirmed, then generate the pdf
            $sent = false;
            if ($request->status == '1'){
                $data = [
                    'appointment' => $appointment
                ];
                $this->generateAppointmentReport($data);
                $sent = true;
                $this->__alert__('info', "Cita actualizada correctamente. Se ha enviado la confirmación de la cita al cliente por correo electrónico.");
            }
            else if ($request->status == '2'){
                // send cancelled appointment email
                $mail = new AppointmentCancelled($appointment);
                Mail::to($appointment->user->email)->send($mail);

                $sent = true;

                $this->__alert__('warning', "Cita actualizada correctamente. La cita se ha rechazado y notificado al cliente por correo electrónico.");
                $this->__alert__('info', "Si se trata de un error, favor de actualizar el estatus de la cita");
            }

            $appointment->save();

            if (!$sent) $this->__alert__('success', "Cita actualizada correctamente.");

            return redirect()->route('appointment.show', $appointment);
        }
        else {
            $hours               = Carbon::parse($request->hour)->format('H');
            $minutes             = Carbon::parse($request->hour)->format('i');
            $appointment_date    = Carbon::parse($request->date)->addHours($hours)->addMinutes($minutes);

            $appointment->date   = $appointment_date;
            $appointment->reason = $request->reason;
            $appointment->pet_id = $request->pet_id;

            // Al actualizar una cita, el estatus cambia a pendiente (por el cliente)
            $appointment->status = 0;

            $appointment->save();

            $this->__alert__('success', "La cita fue actualizada correctamente");

            return redirect()->route('appointment.show', $appointment);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $response = Gate::inspect('delete-appointment', $appointment);

        if ($response->allowed()){
            $appointment->delete();

            $this->__alert__('error', "La cita ha sido cancelada y eliminada.");

            return redirect()->route('appointment.index');
        }
        $this->__alert__('error', $response->message());
        abort($response->status());

    }
}
