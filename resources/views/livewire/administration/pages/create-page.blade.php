@slot('title')
    {{ __('Create Page') }}
@endslot

@slot('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Administration') }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pages.index') }}">{{ __('Pages') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Create Page') }}</li>
    </ol>
@endslot

@include('livewire.administration.pages.partials.page-form', ['title' => __('Create Page')])
