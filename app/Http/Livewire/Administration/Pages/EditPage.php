<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Constants\Permissions;
use App\Models\Page;

class EditPage extends PageBase
{
    public function mount(Page $page): void
    {
        $this->authorize(Permissions::PAGES_EDIT);
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.administration.pages.edit-page');
    }
}
