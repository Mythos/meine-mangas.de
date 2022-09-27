<div class="d-inline">
    <select id="language" name="language" class="form-select @error('language') is-invalid @enderror" style="width: auto;" wire:model='language' required>
        <option value="de">{{ trans('languages.de') }}</option>
        <option value="en">{{ trans('languages.en') }}</option>
    </select>
</div>
