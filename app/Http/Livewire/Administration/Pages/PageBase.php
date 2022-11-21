<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Constants\Permissions;
use App\Http\Livewire\BaseComponent;
use App\Models\Page;
use Exception;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PageBase extends BaseComponent
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
        $this->authorize(Permissions::PAGES_EDIT);
        $this->validate();
        try {
            if ($this->page->position != $this->page->getOriginal('position')) {
                $this->page->order = (Page::wherePosition($this->page->position)->max('order') ?? 0) + 1;
            }
            $originalPosition = $this->page->getOriginal('position');
            $this->page->save();
            if ($originalPosition != $this->page->position) {
                $this->resetOrder($originalPosition);
                $this->resetOrder($this->page->position);
            }

            return redirect()->route('pages.index');
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

    public function delete(): void
    {
        $this->authorize(Permissions::PAGES_DELETE);
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
        $this->authorize(Permissions::PAGES_DELETE);
        if ($this->page->id == 0) {
            return;
        }
        $this->page->delete();
        redirect()->route('pages.index');
    }

    private function resetOrder(int $position): void
    {
        $pages = Page::wherePosition($position)->orderBy('order')->get();
        $order = 1;
        foreach ($pages as $page) {
            $page->order = $order;
            $page->save();
            $order++;
        }
    }
}
