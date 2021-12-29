<div class="mb-2 row" {{ $hidden ?? '' }}>
    @isset($labelValue)<label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>@endisset
    <div class="col-{{ !isset($labelValue) ? '12' : '6' }} col-xxl-{{ !isset($labelValue) ? '12' : '7' }}">
        <div class="input-group">
            <select {{ isset($form) ? 'form='.$form : '' }}
                    {{ isset($wireModel) ? 'wire:model.lazy='.$wireModel : '' }}
                    {{ isset($wireChange) ? 'wire:change.lazy='.$wireChange : '' }}
                    class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }} @error($name) is-invalid @enderror"
                    name="{{ $name }}"
                {{ $disabled ?? '' }}>
                <option value selected>---</option>
                @foreach($items as $item)
                    <option
                        value="{{ $item->f_id }}" {{ selected($name, $item->f_id, $defaultValue ?? null) }}>{{ $item->f_id }}</option>
                @endforeach
            </select>
            <button
                {{ isset($form) ? 'form='.$form : '' }}
                name="{{ $buttonName }}"
                value="{{ $buttonValue }}"
                type="{{ $buttonType ?? 'submit' }}"
                class="input-group-text {{ $buttonClass ?? '' }}"
                autocomplete="off"
                {{ $disabled ?? '' }}>
                <i class="fas fa-ellipsis-v"></i>
            </button>
            @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
    </div>
</div>

@isset($showName)
    @if($showName)
        <div class="mb-2 row" {{ $hidden ?? '' }}>
            <div class="col-12 col-xxl-12">
                <div class="input-group">
                    <input
                        type="text"
                        wire:model="{{$name . '_readonly_name'}}"
                        class="form-control form-control-sm"
                        maxlength="255"
                        readonly
                    >
                </div>
            </div>
        </div>
    @endif
@endisset
