<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Models\Page;
use Exception;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PageBase extends Component
{
    use LivewireAlert;

    public Page $page;

    protected $listeners = [
        'confirmedDelete',
    ];

    protected $rules = [
        'page.title' => 'required',
        'page.content' => 'nullable',
        'page.position' => 'required|integer|min:0',
        'page.order' => 'required|integer|min:0',
    ];

    public function updated($property, $value): void
    {
        $this->validateOnly($property);
    }

    public function save()
    {
        $this->validate();
        try {
            if ($this->page->position != $this->page->getOriginal('position')) {
                $this->page->order = (Page::wherePosition($this->page->position)->max('order') ?? 0) + 1;
            }
            $this->page->save();

            return redirect()->route('pages.index');
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

    public function delete(): void
    {
        if ($this->page->id == 0) {
            return;
        }
        $this->confirm(__('Are you sure you want to delete :name?', ['name' => $this->page->title]), [
            'confirmButtonText' => __('Delete'),
            'cancelButtonText' => __('Cancel'),
            'onConfirmed' => 'confirmedDelete',
        ]);
    }

    public function confirmedDelete(): void
    {
        if ($this->page->id == 0) {
            return;
        }
        $this->page->delete();
        redirect()->route('pages.index');
    }
}
