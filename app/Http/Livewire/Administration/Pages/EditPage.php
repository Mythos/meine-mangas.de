<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Models\Page;

class EditPage extends PageBase
{
    public function mount(Page $page): void
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.administration.pages.edit-page')->extends('layouts.app');
    }
}
