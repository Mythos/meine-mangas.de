<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Http\Livewire\BaseComponent;
use App\Models\Page;

class ShowPage extends BaseComponent
{
    public Page $page;

    public function mount(Page $page): void
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.administration.pages.show-page');
    }
}
