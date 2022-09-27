@section('title')
    {{ __('Pages') }}
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Administration') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Pages') }}</li>
    </ol>
@endsection

<div class="row bg-white shadow-sm rounded p-3">
    <div>
        <h2 style="display: inline;">{{ __('Pages') }}</h2>
        <div class="float-end">
            <a href="{{ route('pages.create') }}" class="btn btn-link"><span class="fas fa-plus-circle"></span></a>
        </div>
    </div>
    <div class="mt-2">
        <h3>{{ __('None') }}</h3>
        @include('livewire.administration.pages.page-table', ['pages' => $none])
    </div>
    <div class="mt-2">
        <h3>{{ __('Footer (left)') }}</h3>
        @include('livewire.administration.pages.page-table', ['pages' => $footerLeft])
    </div>
    <div class="mt-2">
        <h3>{{ __('Footer (right)') }}</h3>
        @include('livewire.administration.pages.page-table', ['pages' => $footerRight])
    </div>
</div>
