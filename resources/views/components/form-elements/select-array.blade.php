<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>
    <div class="col-6 col-xxl-7">
        <div class="input-group">
            <select {{ isset($form) ? 'form='.$form : '' }}
                    {{ isset($wireModel) ? 'wire:model.lazy='.$wireModel : '' }}
                    {{ isset($wireChange) ? 'wire:change.lazy='.$wireChange : '' }}
                    {{ $disabled ?? '' }}
                    autocomplete="off"
                    class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }} @error($name) is-invalid @enderror"
                    name="{{ $name }}">
                @foreach($items as $item)
                    <option
                        value="{{ $item }}" {{ selected($name, $item, $defaultValue ?? '') }}>@lang($selectValue . $item)</option>
                @endforeach
            </select>
            @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
    </div>

    @if(isset($disabled) )
        <input {{ isset($wireModel) ? 'wire:model.lazy='.$wireModel : '' }}
               type="hidden"
               name="{{ $name }}"
               value="{{ $defaultValue }}">
    @endif
</div>
