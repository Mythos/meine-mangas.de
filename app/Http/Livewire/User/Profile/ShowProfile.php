<?php

namespace App\Http\Livewire\User\Profile;

use App\Http\Livewire\BaseComponent;
use App\Models\User;

class ShowProfile extends BaseComponent
{
    public User $user;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.language' => 'required|alpha|size:2',
        'user.format_isbns_enabled' => 'boolean',
        'user.date_format' => 'required',
        'user.secondary_title_preference' => 'required|integer|min:0',
    ];

    public function mount(): void
    {
        $this->user = User::find(auth()->user()->id);
    }

    public function save()
    {
        $this->validate();
        $this->user->save();
        // toastr()->addSuccess(__('Your profile has been updated'));

        return redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.user.profile.show-profile')->extends('layouts.app')->section('content');
    }
}
