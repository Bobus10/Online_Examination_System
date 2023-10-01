<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tbody extends Component
{
    public $content, $propsNames, $route;
    public function __construct($content, $propsNames, $route)
    {
        $this->content = $content;
        $this->propsNames = $propsNames;
        $this->route = $route;
    }


    public function render(): View|Closure|string
    {
        return view('components.table.tbody');
    }
}
