<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DestroyModal extends Component
{
    public function __construct(
        public int $id,
        public string $route
    ) {
    }

    public function render(): View
    {
        return view('components.destroy-modal');
    }
}
