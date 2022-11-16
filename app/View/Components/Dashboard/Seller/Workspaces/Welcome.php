<?php

namespace App\View\Components\Dashboard\Seller\Workspaces;

use Illuminate\View\Component;

class Welcome extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.seller.workspaces.welcome');
    }
}
