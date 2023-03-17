<?php

namespace App\View\Components\Pet;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowPet extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $pet, public $extra)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pet.row-pet');
    }
}
