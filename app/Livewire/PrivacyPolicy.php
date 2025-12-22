<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.web')]
class PrivacyPolicy extends Component
{
    public function render()
    {
        $meta = seo('privacy-policy');

        return view('livewire.privacy-policy')
            ->with(['title' => $meta->title]);
    }
}

