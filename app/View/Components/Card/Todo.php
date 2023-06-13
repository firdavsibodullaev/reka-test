<?php

namespace App\View\Components\Card;

use App\Models\Todo as Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Todo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Model $todo)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.todo');
    }
}
