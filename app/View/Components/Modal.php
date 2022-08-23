<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $id;
    public string $title;
    public string $buttonText;
    public bool $dismissable;
    public ?string $action;

    public function __construct(string $id, string $title, ?string $buttonText = null, bool $dismissable = true, ?string $action = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->buttonText = $buttonText ?: ($action ? __('Save') : __('Close'));
        $this->dismissable = $dismissable;
        $this->action = $action;
    }

    public function render(): View
    {
        return view('components.modal');
    }
}
