<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserDashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $appointments, public $pets)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.user-dashboard');
    }
}
