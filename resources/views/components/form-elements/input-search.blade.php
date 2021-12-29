<div>
    <div class="mb-2 row" {{ $hidden ?? '' }}>
        @isset($labelValue)<label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>@endisset
        <div class="col-{{ !isset($labelValue) ? '12' : '6' }} col-xxl-{{ !isset($labelValue) ? '12' : '7' }}">
            <div class="input-group">
                <input
                    wire:model="{{ $name }}"
{{--                    wire:keydown.enter="doSomething"--}}
                    type="text"
                    class="form-control form-control-sm {{ $inputClass ?? '' }} @error( $name ) is-invalid @enderror"
                    name="{{ $name }}"
                    placeholder="search"
                    maxlength="255"
                    autocomplete="off"
                >
                <button
                    wire:click="clickSearchButton('{{$name}}')"
                    {{ isset($form) ? 'form='.$form : '' }}
                    type="button"
                    class="input-group-text {{ $buttonClass ?? '' }}"
                    {{ $disabled ?? '' }}>
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                @error($name) <span class="invalid-feedback"
                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            @if($showSelectStock)
                <div class="position-absolute" style="z-index: 1000">
                <select class="form-control choices-multiple" multiple>
                    @foreach($searchResults as $result)
                        <option
                            wire:click="{{\Illuminate\Support\Str::camel('set_'.$name)}}('{{ $result->f_id }}', '{{ $result->f_name }}')">{{$result->f_id . '(' . $result->f_name . ')'}}</option>
                    @endforeach
                </select>
                </div>
            @endif
        </div>
    </div>

    @isset($showName)
        @if($showName)
            <div class="mb-2 row" {{ $hidden ?? '' }}>
                <div class="col-12 col-xxl-12">
                    <div class="input-group">
                        <input
                            type="text"
                            wire:model="{{ $name }}_show_name"
                            class="form-control form-control-sm"
                            maxlength="255"
                            readonly
                        >
                    </div>
                </div>
            </div>
        @endif
    @endisset
</div>
