<?php

namespace App\View\Components\Mascotas;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowMascota extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $mascota, public $extra)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mascotas.row-mascota');
    }
}
