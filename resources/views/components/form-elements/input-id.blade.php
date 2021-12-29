<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>
    <div class="col-6 col-xxl-7">
        <input {{ isset($form) ? 'form='.$form : '' }}
               {{ isset($wireModel) ? 'wire:model.lazy='.$wireModel : '' }}
               {{ isset($wireModelLazy) ? 'wire:model.lazy='.$wireModelLazy : '' }}
               {{ isset($wireChange) ? 'wire:change.lazy='.$wireChange : '' }}
               type="text"
               class="form-control form-control-sm {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
               name="{{ $name }}"
               id-pattern
               maxlength="{{ $maxLength ?? '255' }}"
               value="{{ old($name, $defaultValue ?? '')}}"
               autocomplete="off"
            {{ $readonly ?? '' }}>
        @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>
