@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/pricePartner.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('price-partner-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('partners.edit', $partner) }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="price-partner-form" action="{{ route('price-partners.store', $partner) }}" method="POST">
            @csrf

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label
                                        class="form-label">@lang('modules/pricePartner.f_stockid')</label>
                                    <select
                                        class="not-empty form-control form-control-sm @error('f_stockid') is-invalid @enderror"
                                        name="f_stockid">
                                        <option value selected>---</option>
                                        @foreach($stocks as $stock)
                                            <option
                                                value="{{ $stock->f_id }}" {{ selected('f_stockid', $stock->f_id) }}>{{ $stock->f_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('f_stockid') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label
                                        class="form-label">@lang('modules/pricePartner.f_quant')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_quant') is-invalid @enderror"
                                           name="f_quant"
                                           maxlength="13"
                                           value="{{ old('f_quant', 0)}}">
                                    @error('f_quant') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label
                                        class="form-label">@lang('modules/pricePartner.f_price')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_price') is-invalid @enderror"
                                           name="f_price"
                                           maxlength="15"
                                           value="{{ old('f_price', '0.0000')}}">
                                    @error('f_price') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label
                                        class="form-label">@lang('modules/pricePartner.f_vat_perc')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_vat_perc') is-invalid @enderror"
                                           name="f_vat_perc"
                                           maxlength="6"
                                           value="{{ old('f_vat_perc', 21)}}">
                                    @error('f_vat_perc') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/pricePartner.f_valid_from')</label>
                                    <input
                                        type="text"
                                        class="not-empty form-control form-control-sm date @error('f_valid_from') is-invalid @enderror"
                                        name="f_valid_from"
                                        placeholder="@lang('global.select_date')"
                                        value="{{ old('f_valid_from', $todayDate) }}">
                                    @error('f_valid_from') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/pricePartner.f_valid_till')</label>
                                    <input
                                        type="text"
                                        class="form-control form-control-sm date @error('f_valid_till') is-invalid @enderror"
                                        name="f_valid_till"
                                        placeholder="@lang('global.select_date')"
                                        value="{{ old('f_valid_till') }}">
                                    @error('f_valid_till') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/pricePartner.f_active')</span>
                                        <input type="hidden" name="f_active" value="0">
                                        <input type="checkbox" name="f_active"
                                               class="form-check-input @error('f_active') is-invalid @enderror"
                                               value="{{ old('f_active', 1) }}" {{ old('f_active', 1) == 1 ? 'checked' : '' }}>
                                    </label>
                                    @error('f_active') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label
                                        class="form-label">@lang('modules/pricePartner.f_system1')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                           name="f_system1"
                                           maxlength="100"
                                           value="{{ old('f_system1') }}">
                                    @error('f_system1') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label
                                        class="form-label">@lang('modules/pricePartner.f_system2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                           name="f_system2"
                                           maxlength="100"
                                           value="{{ old('f_system2') }}">
                                    @error('f_system2') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label
                                        class="form-label">@lang('modules/pricePartner.f_system3')</label>
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
@endsection
