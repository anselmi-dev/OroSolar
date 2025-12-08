<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.about')->layout('components.layouts.web');
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
