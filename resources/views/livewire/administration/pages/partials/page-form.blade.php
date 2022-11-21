<div class="row bg-white shadow-sm rounded">
    <div class="col-md-12">
        <div class="p-3 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="text-right">{{ $title }}</h4>
            </div>
            <form method="POST" wire:submit.prevent='save'>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <label for="page.title" class="col-form-label required">{{ __('Title') }}</label>
                        <input id="page.title" name="page.title" type="text" class="form-control @error('page.title') is-invalid @enderror" wire:model.debounce.500ms='page.title' autofocus>
                        @error('page.title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <label for="page.content" class="col-form-label">{{ __('Content') }}</label>
                        <textarea id="page.content" name="page.content" type="text" class="form-control @error('page.content') is-invalid @enderror" wire:model.debounce.500ms='page.content' rows="20">
                        </textarea>
                        @error('page.content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <label for="page.position" class="col-form-label">{{ __('Position') }}</label>
                        <select id="page.position" name="page.position" class="form-select @error('page.position') is-invalid @enderror" wire:model.debounce.500ms='page.position'>
                            <option value="{{ PagePosition::NONE->value }}">{{ __('None') }}</option>
                            <option value="{{ PagePosition::FOOTER_LEFT->value }}">{{ __('Footer (left)') }}</option>
                            <option value="{{ PagePosition::FOOTER_RIGHT->value }}">{{ __('Footer (right)') }}</option>
                        </select>
                        @error('page.position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    @can(Permissions::PAGES_DELETE)
                        @if ($page->id > 0)
                            <div class="float-start mb-3">
                                <button type="button" class="btn btn-danger" wire:click='delete'>{{ __('Delete') }}</button>
                            </div>
                        @endif
                    @endcan
                    @can(Permissions::PAGES_EDIT)
                        <div class="float-end mb-3">
                            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                        </div>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
