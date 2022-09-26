<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Models\Page;
use Livewire\Component;

class ShowPage extends Component
{
    public Page $page;

    public function mount(Page $page): void
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.administration.pages.show-page')->extends('layouts.app');
    }
}
