<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.web')]
class About extends Component
{
    public function render()
    {
        $meta = seo('about');

        return view('livewire.about')
            ->with(['title' => $meta->title]);
    }

    #[Computed]
    public function team()
    {
        return [
            [
                'name' => 'Adrian Javier',
                'role' => 'Project Manager',
                'image' => 'https://placehold.co/600x400',
            ],
            [
                'name' => 'Adrian Javier',
                'role' => 'Project Manager',
                'image' => 'https://placehold.co/600x400',
            ],
            [
                'name' => 'Adrian Javier',
                'role' => 'Project Manager',
                'image' => 'https://placehold.co/600x400',
            ],
            [
                'name' => 'Adrian Javier',
                'role' => 'Project Manager',
                'image' => 'https://placehold.co/600x400',
            ],
            [
                'name' => 'Adrian Javier',
                'role' => 'Project Manager',
                'image' => 'https://placehold.co/600x400',
            ],
            [
                'name' => 'Adrian Javier',
                'role' => 'Project Manager',
                'image' => 'https://placehold.co/600x400',
            ],
        ];
    }
}
