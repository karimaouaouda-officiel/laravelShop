<?php

namespace App\View\Components\Template\Parts;

use Illuminate\View\Component;

class Feautures extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $pic;
    public function __construct($title ,$src)
    {
        $this->title = $title;
        $this->pic = $src;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template.parts.feautures');
    }
}
