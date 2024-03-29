<?php

namespace App\View\Components\Helpers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormFieldWithoutErrors extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $field, public string $text, public string $type, public string $placeholder, public $value)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.form-field-without-errors');
    }
}
