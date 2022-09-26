@section('title')
    {{ $page->title }}
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Administration') }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('pages.index') }}">{{ __('Pages') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
@endsection

@section('content')
    @include('livewire.administration.pages.page-form', ['title' => __('Edit Page')])
@endsection
