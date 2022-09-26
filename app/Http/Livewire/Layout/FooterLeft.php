<?php

namespace App\Http\Livewire\Layout;

use App\Enums\PagePosition;
use App\Models\Page;
use Livewire\Component;

class FooterLeft extends Component
{
    public function render()
    {
        return view('livewire.layout.footer-left', [
            'pages' => Page::wherePosition(PagePosition::FOOTER_LEFT)->orderBy('order')->get(),
        ]);
    }
}
