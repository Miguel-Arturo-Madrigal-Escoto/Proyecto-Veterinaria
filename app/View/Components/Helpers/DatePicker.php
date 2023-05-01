<?php

namespace App\View\Components\Helpers;

use Closure;
use DateTimeImmutable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePicker extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $text, public $value)
    {
        try {
            $this->value = new DateTimeImmutable($this->value);
        } catch (\Throwable $th) {
            $this->value = now();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.date-picker');
    }
}
