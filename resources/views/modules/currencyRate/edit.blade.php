@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/currencyRate.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('currency-rate-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('currencies.edit', $currency) }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="currency-rate-form" action="{{ route('currency-rates.update', [$currency, $currencyRate]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currencyRate.f_from')</label>
                                    <input
                                        type="text"
                                        class="form-control form-control-sm date"
                                        name="f_from"
                                        value="{{ old('f_from', $currencyRate->f_from) }}">
                                    @error('f_from') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currencyRate.f_rate')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_rate') is-invalid @enderror"
                                           name="f_rate"
                                           maxlength="100"
                                           value="{{ old('f_rate', $currencyRate->f_rate)}}">
                                    @error('f_rate') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currencyRate.f_dim')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_dim') is-invalid @enderror"
                                           name="f_dim"
                                           maxlength="100"
                                           value="{{ old('f_dim', $currencyRate->f_dim)}}">
                                    @error('f_dim') <span class="invalid-feedback"
                                                          role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currencyRate.f_system1')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                           name="f_system1"
                                           maxlength="100"
                                           value="{{ old('f_system1', $currencyRate->f_system1) }}">
                                    @error('f_system1') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currencyRate.f_system2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                           name="f_system2"
                                           maxlength="100"
                                           value="{{ old('f_system2', $currencyRate->f_system2) }}">
                                    @error('f_system2') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currencyRate.f_system3')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                           name="f_system3"
                                           maxlength="100"
                                           value="{{ old('f_system3', $currencyRate->f_system3) }}">
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
@endsection
