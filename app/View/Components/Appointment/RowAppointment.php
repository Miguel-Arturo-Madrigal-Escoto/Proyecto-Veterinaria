<?php

namespace App\View\Components\Appointment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowAppointment extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $appointment, public $extra)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.appointment.row-appointment');
    }
}
