<?php

namespace App\View\Components\Helpers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimpleCardBoilerplate extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $size)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.simple-card-boilerplate');
    }
}
