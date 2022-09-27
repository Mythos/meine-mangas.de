<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Constants\Permissions;
use App\Models\Page;

class CreatePage extends PageBase
{
    public function mount(): void
    {
        $this->authorize(Permissions::PAGES_EDIT);
        $this->page = new Page([
            'position' => 0,
            'order' => 0,
        ]);
    }

    public function render()
    {
        return view('livewire.administration.pages.create-page')->extends('layouts.app');
    }
}
