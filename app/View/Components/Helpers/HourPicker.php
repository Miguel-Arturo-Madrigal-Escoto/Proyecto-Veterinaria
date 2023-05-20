<?php

namespace App\View\Components\Helpers;

use Closure;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HourPicker extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $field, public $text, public $value)
    {
        // check if it has the format: 12:00 AM/PM

        //$d = DateTime::createFromFormat('h:i A', $this->value);
        //$this->value = ($d && $d->format('h:i A') === $this->value)? $this->value : '12:00 PM';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.hour-picker');
    }
}
