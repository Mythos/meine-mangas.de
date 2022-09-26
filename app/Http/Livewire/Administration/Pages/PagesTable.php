<?php

namespace App\Http\Livewire\Administration\Pages;

use App\Enums\PagePosition;
use App\Models\Page;
use Livewire\Component;

class PagesTable extends Component
{
    public $none;

    public $footerLeft;

    public $footerRight;

    public function render()
    {
        $this->none = Page::wherePosition(PagePosition::NONE)->orderBy('order')->get();
        $this->footerLeft = Page::wherePosition(PagePosition::FOOTER_LEFT)->orderBy('order')->get();
        $this->footerRight = Page::wherePosition(PagePosition::FOOTER_RIGHT)->orderBy('order')->get();

        return view('livewire.administration.pages.pages-table')->extends('layouts.app');
    }

    public function move_up(int $id): void
    {
        $page = Page::find($id);
        if ($page->order <= 1) {
            return;
        }
        $predecessor = Page::wherePosition($page->position)->orderByDesc('order')->where('order', '<', $page->order)->first();
        $page->order = --$page->order;
        $predecessor->order = ++$predecessor->order;

        $page->save();
        $predecessor->save();
        $this->resetOrder($page->position);
    }

    public function move_down(int $id): void
    {
        $page = Page::find($id);
        if ($page->order >= Page::wherePosition($page->position)->max('order')) {
            return;
        }
        $successor = Page::wherePosition($page->position)->orderBy('order')->where('order', '>', $page->order)->first();
        $page->order = ++$page->order;
        $successor->order = --$successor->order;

        $page->save();
        $successor->save();
        $this->resetOrder($page->position);
    }

    public function resetOrder(int $position): void
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