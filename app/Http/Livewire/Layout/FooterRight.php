<?php

namespace App\Http\Livewire\Layout;

use App\Enums\PagePosition;
use App\Models\Page;
use Livewire\Component;

class FooterRight extends Component
{
    public function render()
    {
        return view('livewire.layout.footer-right', [
            'pages' => Page::wherePosition(PagePosition::FOOTER_RIGHT)->orderBy('order')->get(),
        ]);
    }
}
