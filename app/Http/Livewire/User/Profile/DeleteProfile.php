<?php

namespace App\Http\Livewire\User\Profile;

use App\Http\Livewire\BaseComponent;
use App\Models\User;

class DeleteProfile extends BaseComponent
{
    public string $current_password = '';

    protected $rules = [
        'current_password' => 'required|current_password',
    ];

    public function render()
    {
        return view('livewire.user.profile.delete-profile')->extends('layouts.app')->section('content');
    }

    public function save()
    {
        $this->validate();

        $user = User::find(auth()->user()->id);
        auth()->logout();
        $user->delete();

        // toastr()->addSuccess(__('Your password has been changed'));

        return redirect()->route('home');
    }
}
