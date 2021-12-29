@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/bonus.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('bonus-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="bonus-form" action="{{ route('bonuses.store', $employee) }}" method="POST">
            @csrf

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/bonus.f_bonus_name')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_bonus_name') is-invalid @enderror"
                                           name="f_bonus_name"
                                           maxlength="100"
                                           value="{{ old('f_bonus_name')}}">
                                    @error('f_bonus_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/bonus.f_value')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_value') is-invalid @enderror"
                                           name="f_value"
                                           maxlength="10"
                                           value="{{ old('f_value', 0) }}">
                                    @error('f_value') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/bonus.f_type')</label>
                                    <select
                                        class="form-control form-control-sm @error('f_type') is-invalid @enderror"
                                        name="f_type">
                                        <option value selected>---</option>
                                        @foreach($types as $type)
                                            <option
                                                value="{{ $type }}" {{ selected('f_type', $type) }}>@lang('modules/bonus.type' . $type)</option>
                                        @endforeach
                                    </select>
                                    @error('f_type') <span class="invalid-feedback"
                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/bonus.f_reason')</label>
                                    <select
                                        class="not-empty form-control form-control-sm @error('f_reason') is-invalid @enderror"
                                        name="f_reason">
                                        <option value selected>---</option>
                                        @foreach($reasons as $reason)
                                            <option
                                                value="{{ $reason }}" {{ selected('f_reason', $reason) }}>@lang('modules/bonus.reason' . $reason)</option>
                                        @endforeach
                                    </select>
                                    @error('f_reason') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/bonus.f_date_from')</label>
                                    <input
                                        type="text"
                                        class="not-empty form-control form-control-sm date @error('f_date_from') is-invalid @enderror"
                                        name="f_date_from"
                                        placeholder="@lang('global.select_date')"
                                        value="{{ old('f_date_from') }}">
                                    @error('f_date_from') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/bonus.f_date_till')</label>
                                    <input
                                        type="text"
                                        class="not-empty form-control form-control-sm date @error('f_date_till') is-invalid @enderror"
                                        name="f_date_till"
                                        placeholder="@lang('global.select_date')"
                                        value="{{ old('f_date_till') }}">
                                    @error('f_date_till') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/bonus.f_description')</label>
                                    <textarea
                                        class="form-control form-control-sm @error('f_description') is-invalid @enderror"
                                        name="f_description"
                                        rows="4"
                                        cols="50">{{ old('f_description')}}</textarea>
                                    @error('f_description') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
