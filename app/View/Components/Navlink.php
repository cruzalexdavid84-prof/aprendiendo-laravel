<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navlink extends Component
{
    //Las propiedades publicas de la clase van a estar disponibles automaticamente como variables
    //...En el template
    public string $to = ""; //--Aca se declara una variable 
    /**
     * Create a new component instance.
     */
    public function __construct(string $to = '')
    {
        $this->to = $to; //el $this-> to es una propiedad de $this???
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navlink');
    }
}
