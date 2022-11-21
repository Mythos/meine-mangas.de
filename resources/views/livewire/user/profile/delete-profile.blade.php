@slot('title')
    {{ __('Delete Profile') }}
@endslot

@slot('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">{{ __('My Profile') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Delete Profile') }}</li>
    </ol>
@endslot

<form method="POST" wire:submit.prevent='save'>
    <div class="row bg-white shadow-sm rounded">
        <div class="col-md-12">
            <div class="p-3 py-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">{{ __('Delete Profile') }}</h4>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <label for="current_password" class="col-form-label required">{{ __('Current Password') }}</label>
                        <input id="current_password" name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" wire:model.debounce.500ms='current_password' autofocus>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-danger" type="submit">{{ __('Delete Profile') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
