<?php

namespace App\View\Components\Helpers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormMultipleSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $name, public $text, public $options)
    {
        // from selects with a name as an array
        // $this->name = str_replace('[]', '', $this->name);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.form-multiple-select');
    }
}
