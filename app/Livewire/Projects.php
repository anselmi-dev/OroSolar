<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.web')]
class Projects extends Component
{
    public function render()
    {
        $meta = seo('projects');

        return view('livewire.projects')
            ->with(['title' => $meta->title]);
    }
}

