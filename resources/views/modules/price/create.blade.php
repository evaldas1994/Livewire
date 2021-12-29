@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            @if($type == 'S')
                <h1>@lang('modules/price.h1_sale')</h1>
            @endif

            @if($type == 'P')
                <h1>@lang('modules/price.h1_purch')</h1>
            @endif
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('price-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="price-form" action="{{ route('prices.store', [$stock, $type]) }}" method="POST">
            @csrf

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_price')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_price') is-invalid @enderror"
                                           name="f_price"
                                           maxlength="15"
                                           value="{{ old('f_price', '0.0000')}}">
                                    @error('f_price') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_storeid')</label>
                                    <select
                                        class="form-control form-control-sm @error('f_storeid') is-invalid @enderror"
                                        name="f_storeid">
                                        <option value selected>---</option>
                                        @foreach($stores as $store)
                                            <option
                                                value="{{ $store->f_id }}" {{ selected('f_storeid', $store->f_id) }}>{{ $store->f_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('f_storeid') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_partner_groupid')</label>
                                    <select
                                        class="form-control form-control-sm @error('f_partner_groupid') is-invalid @enderror"
                                        name="f_partner_groupid">
                                        <option value selected>---</option>
                                        @foreach($partnerGroups as $group)
                                            <option
                                                value="{{ $group->f_id }}" {{ selected('f_partner_groupid', $group->f_id) }}>{{ $group->f_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('f_partner_groupid') <span class="invalid-feedback"
                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_barcodeid')</label>
                                    <select
                                        class="form-control form-control-sm @error('f_barcodeid') is-invalid @enderror"
                                        name="f_barcodeid">
                                        <option value selected>---</option>
                                        @foreach($barcodes as $barcode)
                                            <option
                                                value="{{ $barcode->f_id }}" {{ selected('f_barcodeid', $barcode->f_id) }}>{{ $barcode->f_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('f_barcodeid') <span class="invalid-feedback"
                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                @if($type == 'P')
                                    <div class="mb-2">
                                        <label class="form-label">@lang('modules/price.f_partnerid')</label>
                                        <select
                                            class="form-control form-control-sm @error('f_partnerid') is-invalid @enderror"
                                            name="f_partnerid">
                                            <option value selected>---</option>
                                            @foreach($partners as $partner)
                                                <option
                                                    value="{{ $partner->f_id }}" {{ selected('f_partnerid', $stock->f_id) }}>{{ $partner->f_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('f_partnerid') <span class="invalid-feedback"
                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                    </div>
                                @endif

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_valid_from')</label>
                                    <input
                                        type="text"
                                        class="not-empty form-control form-control-sm date"
                                        name="f_valid_from"
                                        placeholder="@lang('global.select_date')"
                                        value="{{ old('f_valid_from') }}">
                                    @error('f_valid_from') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_valid_till')</label>
                                    <input
                                        type="text"
                                        class="form-control form-control-sm date"
                                        name="f_valid_till"
                                        placeholder="@lang('global.select_date')"
                                        value="{{ old('f_valid_till') }}">
                                    @error('f_valid_till') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-check m-0">
                                        <span class="form-check-label">@lang('modules/price.f_active')</span>
                                        <input type="hidden" name="f_active" value="0">
                                        <input type="checkbox" name="f_active"
                                               class="form-check-input @error('f_active') is-invalid @enderror"
                                               value="{{ old('f_active', 1) }}" {{ old('f_active', 1) == 1 ? 'checked' : '' }}>
                                    </label>
                                    @error('f_active') <span class="invalid-feedback"
                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-check m-0">
                                        <span class="form-check-label">@lang('modules/price.f_daily')</span>
                                        <input type="hidden" name="f_daily" value="0">
                                        <input type="checkbox" name="f_daily"
                                               class="form-check-input @error('f_daily') is-invalid @enderror"
                                               value="{{ old('f_daily', 1) }}" {{ old('f_daily') == 1 ? 'checked' : '' }}>
                                    </label>
                                    @error('f_daily') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_secondprice')</label>
                                    <select
                                        class="form-control form-control-sm @error('f_secondprice') is-invalid @enderror"
                                        name="f_secondprice">
                                        @foreach($secondPriceTypes as $type)
                                            <option
                                                value="{{ $type }}" {{ selected('f_secondprice', $type) }}>@lang('modules/price.second_price_type' . $type)</option>
                                        @endforeach
                                    </select>
                                    @error('f_secondprice') <span class="invalid-feedback"
                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_papercolor')</label>
                                    <select
                                        class="form-control form-control-sm @error('f_papercolor') is-invalid @enderror"
                                        name="f_papercolor">
                                        @foreach($paperColorTypes as $type)
                                            <option
                                                value="{{ $type }}" {{ selected('f_papercolor', $type) }}>@lang('modules/price.paper_color_type' . $type)</option>
                                        @endforeach
                                    </select>
                                    @error('f_papercolor') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_quant')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_quant') is-invalid @enderror"
                                           name="f_quant"
                                           maxlength="15"
                                           value="{{ old('f_quant', '0.0000')}}">
                                    @error('f_quant') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-check m-0">
                                        <span class="form-check-label">@lang('modules/price.f_promotion')</span>
                                        <input type="hidden" name="f_promotion" value="0">
                                        <input type="checkbox" name="f_promotion"
                                               class="form-check-input @error('f_promotion') is-invalid @enderror"
                                               value="{{ old('f_promotion', 1) }}" {{ old('f_promotion') == 1 ? 'checked' : '' }}>
                                    </label>
                                    @error('f_promotion') <span class="invalid-feedback"
                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_stock_name')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_stock_name') is-invalid @enderror"
                                           name="f_stock_name"
                                           maxlength="100"
                                           value="{{ old('f_stock_name', $stock->f_name)}}"
                                           readonly>
                                    @error('f_stock_name') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_stock_barcodeid')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_stock_barcodeid') is-invalid @enderror"
                                           name="f_stock_barcodeid"
                                           maxlength="100"
                                           value="{{ old('f_stock_barcodeid')}}"
                                           readonly>
                                    @error('f_stock_barcodeid') <span class="invalid-feedback"
                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/price.f_price_orig')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_price_orig') is-invalid @enderror"
                                           name="f_price_orig"
                                           maxlength="15"
                                           value="{{ old('f_price_orig', '0.0000')}}"
                                           readonly>
                                    @error('f_price_orig') <span class="invalid-feedback"
                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/price.f_system1')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                           name="f_system1"
                                           maxlength="100"
                                           value="{{ old('f_system1') }}">
                                    @error('f_system1') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/price.f_system2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                           name="f_system2"
                                           maxlength="100"
                                           value="{{ old('f_system2') }}">
                                    @error('f_system2') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/price.f_system3')</label>
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
