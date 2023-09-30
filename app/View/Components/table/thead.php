<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class thead extends Component
{
    public $columnNames;

    public function __construct($columnNames)
    {
        $this->columnNames = $columnNames;
    }

    public function render(): View|Closure|string
    {
        return view('components.table.thead');
    }
}
