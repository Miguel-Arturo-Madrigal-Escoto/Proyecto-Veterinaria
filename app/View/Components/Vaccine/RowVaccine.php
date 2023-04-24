<?php

namespace App\View\Components\Vaccine;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowVaccine extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $vaccine, public $extra)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vaccine.row-vaccine');
    }
}
