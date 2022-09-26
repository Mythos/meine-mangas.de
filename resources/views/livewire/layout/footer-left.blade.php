@foreach ($pages as $page)
    <ul class="nav col-md-4 justify-content-start list-unstyled d-flex">
        <li class="mx-2">
            <a href="{{ route('pages.show', $page) }}" class="text-muted">{{ $page->title }}</a>
        </li>
    </ul>
@endforeach
