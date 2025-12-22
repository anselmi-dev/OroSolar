<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.web')]
class Page extends Component
{
    public function render()
    {
        $meta = seo('page');

        return view('livewire.page')
            ->with(['title' => $meta->title]);
    }
}

