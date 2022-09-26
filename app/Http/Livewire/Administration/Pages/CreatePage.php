<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Models\Page;

class CreatePage extends PageBase
{
    public function mount(): void
    {
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
