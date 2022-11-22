<?php

namespace App\View\Components\Dashboard\Admin\Workspaces;

use App\Models\User;
use Illuminate\View\Component;


class Users extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $users;
    public function __construct()
    {
        $this->users = User::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.admin.workspaces.users');
    }
}
