<?php

namespace App\View\Components\Helpers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardWithImage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $title, public $image, public $alt)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.card-with-image');
    }
}
