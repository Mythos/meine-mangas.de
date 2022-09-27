<?php

namespace App\Http\Livewire\Layout;

use App\Enums\PagePosition;
use App\Http\Livewire\BaseComponent;
use App\Models\Page;

class FooterRight extends BaseComponent
{
    public function render()
    {
        return view('livewire.layout.footer-right', [
            'pages' => Page::wherePosition(PagePosition::FOOTER_RIGHT)->orderBy('order')->get(),
        ]);
    }
}
