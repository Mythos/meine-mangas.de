<?php

namespace App\Http\Livewire\Layout;

use App\Enums\PagePosition;
use App\Http\Livewire\BaseComponent;
use App\Models\Page;

class FooterLeft extends BaseComponent
{
    public function render()
    {
        return view('livewire.layout.footer-left', [
            'pages' => Page::wherePosition(PagePosition::FOOTER_LEFT)->orderBy('order')->get(),
        ]);
    }
}
