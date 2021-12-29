<div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/calendar.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               type="submit"
               wire:click="submit" > @lang('global.btn_save')</a>
            <a href="{{ route('calendars.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form
                        id="calendar-form"
                        action="{{ route('calendars.update', $calendar) }}"
                        method="POST"
                        wire:submit.prevent="submit">
                        @csrf
                        @method('POST')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/calendar.f_year')</label>
                            <input id="f_year"
                                   type="text"
                                   class="form-control form-control-sm @error('f_year') is-invalid @enderror"
                                   name="f_year"
                                   placeholder="@lang('modules/calendar.f_year')"
                                   value="{{ old('f_year', $calendar->f_year) }}"
                                   disabled>
                            @error('f_year') <span id="year-error" class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/calendar.f_month')</label>
                            <select
                                id="f_month"
                                class="form-control form-control-sm @error('f_month') is-invalid @enderror"
                                name="f_month"
                                value="{{ old('f_month') }}"
                                disabled>
                                <option value="1" {{ selected('f_month', 1, $calendar->f_month) }}>Sausis</option>
                                <option value="2" {{ selected('f_month', 2, $calendar->f_month) }}>Vasaris</option>
                                <option value="3" {{ selected('f_month', 3, $calendar->f_month) }}>Kovas</option>
                                <option value="4" {{ selected('f_month', 4, $calendar->f_month) }}>Balandis</option>
                                <option value="5" {{ selected('f_month', 5, $calendar->f_month) }}>Gegužė</option>
                                <option value="6" {{ selected('f_month', 6, $calendar->f_month) }}>Birželis</option>
                                <option value="7" {{ selected('f_month', 7, $calendar->f_month) }}>Liepa</option>
                                <option value="8" {{ selected('f_month', 8, $calendar->f_month) }}>Rugpjūtis</option>
                                <option value="9" {{ selected('f_month', 9, $calendar->f_month) }}>Rugsėjis</option>
                                <option value="10" {{ selected('f_month', 10, $calendar->f_month) }}>Spalis</option>
                                <option value="11" {{ selected('f_month', 11, $calendar->f_month) }}>Lapkritis</option>
                                <option value="12" {{ selected('f_month', 12, $calendar->f_month) }}>Gruodis</option>
                            </select>
                            @error('f_month') <span id="month-error" class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        @if($days !== null)
                            @for ($i = 1; $i < $days + 1; $i++)
                                <div class="mb-2">
                                    <label class="form-check m-0">
                                        <span class="form-check-label">{{$i}}d.</span>
                                        <input
                                            type="hidden"
                                            name="{{'f_d'.$i}}"
                                            value=0
                                            wire:model="{{'f_d'.$i}}">
                                        <input
                                            type="checkbox"
                                            name="{{'f_d'.$i}}"
                                            class="form-check-input @error('f_d'.$i) is-invalid @enderror"
                                            value=1
                                            wire:model="{{'f_d'.$i}}"
                                            {{ $calendar->f_d.$i == '1' ? 'checked' : '' }}>
                                    </label>
                                    @error('f_d'.$i) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            @endfor
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
