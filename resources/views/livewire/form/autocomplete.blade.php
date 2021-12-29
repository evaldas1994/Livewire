<div>

    {{--  main  --}}
    <div class="mb-2 row" {{ Arr::get($params, 'additional_params.main.hidden') ? 'hidden' : '' }}>

        {{-- label  --}}
        @if(!Arr::get($params, 'additional_params.label.hidden') && Str::of(Arr::get($params, 'additional_params.label.value'))->trim()->isNotEmpty())
            <label  class="col-form-label col-6 col-xxl-5 text-sm">
                @lang(Arr::get($params, 'additional_params.label.value'))
            </label>
        @endif

        <div class="{{!Arr::get($params, 'additional_params.label.hidden') && Str::of(Arr::get($params, 'additional_params.label.value'))->trim()->isNotEmpty() ? 'col-6 col-xxl-7' : 'col-12 col-xxl-12'}}">

            {{--  autocomplete  --}}
            <div class="input-group" {{ Arr::get($params, 'additional_params.autocomplete.hidden') ? 'hidden' : '' }}>
                <input
                    wire:model="search"
                    type="search"
                    class="form-control form-control-sm {{ Arr::get($params, 'additional_params.autocomplete.class') }} @error( $inputName ) is-invalid @enderror @if(count($results) === 0 && $search !== null && $search !== Arr::get($params, 'default_value')) is-invalid @endif"
                    name="{{ $inputName }}"
                    maxlength="{{ Arr::get($params, 'additional_params.autocomplete.maxlength')}}"
                    autocomplete="off"
                    {{ Arr::get($params, 'additional_params.autocomplete.readonly') ? 'readonly' : '' }}
                >

                {{--  button  --}}
                <button
                    wire:click="$emitUp('clickSearchButton', '{{ $inputName }}')"
                    type="button"
                    class="input-group-text {{ Arr::get($params, 'additional_params.button.class') ?? '' }}"
                    {{ Arr::get($params, 'additional_params.button.hidden') ? 'hidden' : '' }}
                    {{ Arr::get($params, 'additional_params.button.disabled') ? 'disabled' : '' }}
                >
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                @error($inputName) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            {{--  results  --}}
            @if($showResults && count($results) > 0 && Str::of($search)->trim()->isNotEmpty())
                <div class="position-absolute" style="z-index: 1000" {{ Arr::get($params, 'additional_params.autocomplete.hidden') ? 'hidden' : '' }}>
                    <select class="form-control choices-multiple {{ Arr::get($params, 'additional_params.results.class') ?? '' }}" multiple>
                        @foreach($results as $result)
                            <option wire:click="select('{{ $result->f_id }}', '{{ Str::remove("'", $result->f_name)}}')">{{$result->f_id . '(' . $result->f_name . ')'}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>

    {{--  name  --}}
    <div class="mb-2 row" {{ Arr::get($params, 'additional_params.name.hidden') ? 'hidden' : '' }}>
        <div class="col-12 col-xxl-12">
            <div class="input-group">
                <input
                    type="text"
                    wire:model="searchShowName"
                    class="form-control form-control-sm {{ Arr::get($params, 'additional_params.name.class') ?? '' }}"
                    maxlength="{{ Arr::get($params, 'additional_params.name.maxlength')}}"
                    {{ Arr::get($params, 'additional_params.name.readonly') ? 'readonly' : ''}}
                >
            </div>
        </div>
    </div>
</div>
