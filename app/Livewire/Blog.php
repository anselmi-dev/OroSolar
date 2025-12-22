<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.web')]
class Blog extends Component
{
    public function render()
    {
        return view('livewire.blog');
    }
}

