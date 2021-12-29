<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>
    <div class="col-6 col-xxl-7">
        <input {{ isset($form) ? 'form='.$form : '' }}
               {{ isset($wireModel) ? 'wire:model.lazy='.$wireModel : '' }}
               {{ isset($wireChange) ? 'wire:change.lazy='.$wireChange : '' }}
               type="text"
               class="form-control form-control-sm time {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
               name="{{ $name }}"
               placeholder="@lang('global.select_time')"
               value="{{ old($name, $defaultValue ?? '')}}"
               readonly
               autocomplete="off"
            {{ $disabled ?? '' }}>
        @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>
