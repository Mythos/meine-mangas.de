<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public string $language;

    public function render()
    {
        $this->language = session('app.locale') ?? auth()?->user()?->language ?? config('app.locale');

        return view('livewire.language-switcher');
    }

    public function updatedLanguage($value)
    {
        session(['app.locale' => $value]);

        return redirect(request()->header('Referer'));
    }
}
