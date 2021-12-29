<div class="mb-2 row" {{ $hidden ?? '' }}>
    @isset($labelValue)<label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>@endisset
    <div class="col-{{ !isset($labelValue) ? '12' : '6' }} col-xxl-{{ !isset($labelValue) ? '12' : '7' }}">
    <input {{ isset($form) ? 'form='.$form : '' }}
            {{ isset($wireModel) ? 'wire:model='.$wireModel : '' }}
            {{ isset($wireModelLazy) ? 'wire:model.debounce.500ms='.$wireModelLazy : '' }}
           {{ isset($wireChange) ? 'wire:change.lazy='.$wireChange : '' }}
           type="text"
           class="form-control form-control-sm {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
           name="{{ $name }}"
           maxlength="{{ $maxLength ?? '255' }}"
           value="{{ old($name, $defaultValue ?? '')}}"
           autocomplete="off"
        {{ $readonly ?? '' }}>
    @error($name) <span {{ $errorHidden ?? '' }} class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>
