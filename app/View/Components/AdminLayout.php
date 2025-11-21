<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    public $title;

    public function __construct($title = 'Panel Administrador')
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('components.admin-layout');
    }
}
