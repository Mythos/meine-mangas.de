<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
    @foreach ($pages as $page)
        <li class="mx-2">
            <a href="{{ route('pages.show', $page) }}" class="text-muted">{{ $page->title }}</a>
        </li>
    @endforeach
</ul>
