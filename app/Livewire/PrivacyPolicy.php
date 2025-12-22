<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.web')]
class PrivacyPolicy extends Component
{
    public function render()
    {
        return view('livewire.privacy-policy');
    }
}

