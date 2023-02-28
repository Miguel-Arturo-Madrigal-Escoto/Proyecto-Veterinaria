<?php

namespace App\View\Components\Clientes;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowCliente extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $cliente, public $extra)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clientes.row-cliente');
    }
}
