@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/currency.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#"
               class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('currency-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('currencies.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="currency-form" action="{{ route('currencies.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currency.f_id')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                           name="f_id"
                                           id-pattern
                                           required
                                           maxlength="20"
                                           value="{{ old('f_id') }}">
                                    @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currency.f_name')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                           name="f_name"
                                           maxlength="100"
                                           value="{{ old('f_name') }}">
                                    @error('f_name') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currency.f_symbol')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_symbol') is-invalid @enderror"
                                           name="f_symbol"
                                           maxlength="100"
                                           required
                                           value="{{ old('f_symbol') }}">
                                    @error('f_symbol') <span class="invalid-feedback"
                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currency.f_fraction')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_fraction') is-invalid @enderror"
                                           name="f_fraction"
                                           maxlength="100"
                                           required
                                           value="{{ old('f_fraction') }}">
                                    @error('f_fraction') <span class="invalid-feedback"
                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currency.f_system1')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                           name="f_system1"
                                           maxlength="100"
                                           value="{{ old('f_system1') }}">
                                    @error('f_system1') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currency.f_system2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                           name="f_system2"
                                           maxlength="100"
                                           value="{{ old('f_system2') }}">
                                    @error('f_system2') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currency.f_system3')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                           name="f_system3"
                                           maxlength="100"
                                           value="{{ old('f_system3') }}">
                                    @error('f_system3') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/currencyRate.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <button
                form="currency-form"
                class="btn btn-primary"
                type="submit"
                name="action"
                value="currency-rates-create">
                <i class="fas fa-plus"></i> @lang('global.btn_new')
            </button>
        </div>
    </div>
@endsection
