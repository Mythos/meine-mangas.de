@section('title')
    {{ __('Create Page') }}
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Administration') }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pages.index') }}">{{ __('Pages') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Create Page') }}</li>
    </ol>
@endsection

@include('livewire.administration.pages.page-form', ['title' => __('Create Page')])
