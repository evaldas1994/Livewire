@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/counter.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('counter-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('counters.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="counter-form" action="{{ route('counters.update', $counter) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/counter.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/counter.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $counter->f_id) }}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/counter.f_txt')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_txt') is-invalid @enderror"
                                   name="f_txt"
                                   placeholder="@lang('modules/counter.f_txt')"
                                   maxlength="20"
                                   value="{{ old('f_txt', $counter->f_txt) }}">
                            @error('f_txt') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/counter.f_txt_len')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_txt_len') is-invalid @enderror"
                                   name="f_txt_len"
                                   placeholder="@lang('modules/counter.f_txt_len')"
                                   maxlength="255"
                                   value="{{ old('f_txt_len', $counter->f_txt_len) }}">
                            @error('f_txt_len') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/counter.f_num')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_num') is-invalid @enderror"
                                   name="f_num"
                                   placeholder="@lang('modules/counter.f_num')"
                                   maxlength="255"
                                   value="{{ old('f_num', $counter->f_num) }}">
                            @error('f_num') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/counter.f_num_len')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_num_len') is-invalid @enderror"
                                   name="f_num_len"
                                   placeholder="@lang('modules/counter.f_num_len')"
                                   maxlength="255"
                                   value="{{ old('f_num_len', $counter->f_num_len) }}">
                            @error('f_num_len') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/counter.f_copy_to_ano')</span>
                                <input type="hidden" name="f_copy_to_ano" value="0">
                                <input type="checkbox" name="f_copy_to_ano" class="form-check-input @error('f_copy_to_ano') is-invalid @enderror" value="{{ old('f_copy_to_ano', 1) }}"  {{ old('f_copy_to_ano', $counter->f_copy_to_ano) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_copy_to_ano') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/counter.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/counter.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1', $counter->system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/counter.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/counter.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2', $counter->system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/counter.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/counter.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3', $counter->system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
