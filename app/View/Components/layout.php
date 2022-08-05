<?php

namespace App\View\Components;

use Illuminate\View\Component;

class layout extends Component
{
    public $title;
    public $bodyclass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $bodyclass = '')
    {
        $this->title = $title;
        $this->bodyclass = $bodyclass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout');
    }
}
