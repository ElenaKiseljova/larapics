<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public $src;

    /**
     * Create a new component instance.
     */
    public function __construct($iconSrc)
    {
        $this->src = asset('icons/' . $iconSrc);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon');
    }
}
