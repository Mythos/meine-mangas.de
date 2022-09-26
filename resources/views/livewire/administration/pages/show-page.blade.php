@section('title')
    {{ $page->title }}
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
@endsection

@section('content')
    {!! $page->content !!}
@endsection
