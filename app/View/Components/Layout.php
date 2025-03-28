<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @return void
     */
    public function __construct($title = 'TechScript')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('/components/layout');
    }
}
