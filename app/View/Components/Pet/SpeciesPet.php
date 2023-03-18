<?php

namespace App\View\Components\Pet;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SpeciesPet extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $species)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pet.species-pet');
    }
}
