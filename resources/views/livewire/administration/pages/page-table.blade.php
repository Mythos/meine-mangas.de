<div class="table-responsive my-2" style="width: 100%;">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center" style="width: 2rem; min-width: 2rem;"></th>
                <th>{{ __('Title') }}</th>
                <th class="text-center" style="width: 7rem; min-width: 7rem;">{{ __('Order') }}</th>
                <th scope="col" class="text-center" style="width: 1rem; min-width: 1rem;"></th>
                <th scope="col" class="text-center" style="width: 1rem; min-width: 1rem;"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td class="text-center"><a href="{{ route('pages.edit', [$page]) }}"><span class="fa fa-edit"></span></a></td>
                    <td>{{ $page->title }}</td>
                    <td class="text-center" style="width: 7rem; min-width: 7rem;">{{ $page->order }}</td>
                    <td class="text-center">
                        @if ($page->order > 1)
                            <a wire:click.prevent='move_up({{ $page->id }})' href="#" title="{{ __('Moves the page up') }}"><span class="fa fa-arrow-up"></span></a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($page->order < $pages->max('order'))
                            <a wire:click.prevent='move_down({{ $page->id }})' href="#" title="{{ __('Moves the page down') }}"><span class="fa fa-arrow-down"></span></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            @if (count($pages) == 0)
                <tr>
                    <td colspan="5" style="text-align: center;">{{ __('No data') }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
