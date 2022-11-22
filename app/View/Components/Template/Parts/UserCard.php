<?php

namespace App\View\Components\Template\Parts;

use Illuminate\View\Component;

class UserCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;
    public function __construct($user = NULL)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template.parts.user-card');
    }
}
