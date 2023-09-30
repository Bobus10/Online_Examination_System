<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tbody extends Component
{
    public $content, $propsNames;
    public function __construct($content, $propsNames)
    {
        $this->content = $content;
        $this->propsNames = $propsNames;
    }


    public function render(): View|Closure|string
    {
        return view('components.table.tbody');
    }
}
