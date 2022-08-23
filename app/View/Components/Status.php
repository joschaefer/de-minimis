<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Status extends Component
{
    public string $status;

    public function __construct(?string $status = '')
    {
        $this->status = $status ?: '';
    }

    public function render(): View
    {
        return view('components.status');
    }
}
