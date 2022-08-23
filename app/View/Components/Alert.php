<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $color;
    public bool $dismissable;

    public function __construct(string $color = 'primary', bool $dismissable = false)
    {
        $this->color = $color;
        $this->dismissable = $dismissable;
    }

    public function render(): View
    {
        return view('components.alert');
    }
}
