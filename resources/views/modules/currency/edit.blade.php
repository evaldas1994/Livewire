@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/currency.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('currency-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('currencies.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="currency-form" action="{{ route('currencies.update', $currency) }}" method="POST">
            @csrf
            @method('PUT')

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
                                           value="{{ old('f_id', $currency->f_id) }}">
                                    @error('f_id') <span class="invalid-feedback"
                                                         role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/currency.f_name')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                           name="f_name"
                                           maxlength="100"
                                           value="{{ old('f_name', $currency->f_name) }}">
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
                                           value="{{ old('f_symbol', $currency->f_symbol) }}">
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
                                           value="{{ old('f_fraction', $currency->f_fraction) }}">
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
                                           value="{{ old('f_system1', $currency->f_system1) }}">
                                    @error('f_system1') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currency.f_system2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                           name="f_system2"
                                           maxlength="100"
                                           value="{{ old('f_system2', $currency->f_system2) }}">
                                    @error('f_system2') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/currency.f_system3')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                           name="f_system3"
                                           maxlength="100"
                                           value="{{ old('f_system3', $currency->f_system3) }}">
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/currencyRate.f_id')</th>
                            <th scope="col">@lang('modules/currencyRate.f_curid')</th>
                            <th scope="col">@lang('modules/currencyRate.f_from')</th>
                            <th scope="col">@lang('modules/currencyRate.f_rate')</th>
                            <th scope="col">@lang('modules/currencyRate.f_dim')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($currencyRates as $rate)
                            <tr>
                                <td>{{ $rate->f_id }}</td>
                                <td>{{ $rate->f_curid }}</td>
                                <td>{{ $rate->f_from }}</td>
                                <td>{{ $rate->f_rate }}</td>
                                <td>{{ $rate->f_dim }}</td>
                                <td class="table-action">
                                    <a href="{{ route('currency-rates.edit', [$currency, $rate] ) }}"><i
                                            class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#"
                                       onclick="event.preventDefault();document.getElementById('delete-form-{{ $rate->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('currency-rates.destroy', [$currency, $rate]) }}"
                                          method="POST" class="d-none" id="delete-form-{{ $rate->f_id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
