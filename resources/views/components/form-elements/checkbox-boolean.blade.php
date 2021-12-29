{{--{{ dd( old($name, $defaultValue ?? null)) }}--}}
<div class="mb-2" {{ $hidden ?? '' }}>
    <div class="m-0">
        <div class="input-group">
            <label class="form-control form-control-sm form-check-label {{ $labelClass ?? '' }}" for="{{ $name }}">@lang($labelValue)</label>
            <div class="input-group-text">
                <input {{ isset($form) ? 'form='.$form : '' }} type="hidden" name="{{ $name }}" id="{{ $name }}" value="0">
                <input {{ isset($form) ? 'form='.$form : '' }} type="checkbox" name="{{ $name }}" id="{{ $name }}" class=" {{ $inputClass ?? '' }} @error($name) is-invalid @enderror" value="{{ 1 }}" {{ old($name, $defaultValue ?? null) == 1 ? 'checked' : '' }}>
            </div>
        </div>
    </div>
    @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>
