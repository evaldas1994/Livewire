@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/vat.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('vat-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('vats.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="vat-form" action="{{ route('vats.update',$vat) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/vat.f_id')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/vat.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id',$vat->f_id) }}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/vat.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/vat.f_name')"
                                   maxlength="10"
                                   value="{{ old('f_name',$vat->f_name) }}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/vat.f_vat_perc')</label>
                            <div class="input-group input-group-sm">
                                <input type="text"
                                       class="form-control @error('f_vat_perc') is-invalid @enderror"
                                       name="f_vat_perc"
                                       min="0"
                                       value="{{ old('f_vat_perc',$vat->f_vat_perc) }}"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'allowMinus': false">
                                <span class="input-group-text">%</span>
                                @error('f_vat_perc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/vat.f_vat_perc')</label>
                            <select class="form-control form-control-sm @error('f_default_vat2_id') is-invalid @enderror"
                                    name="f_default_vat2_id"
                                    value="{{ old('f_default_vat2_id') }}">
                                @foreach($vat2s as $vat2)
                                    <option value="{{ $vat2->f_id }}" {{ selected('f_default_vat2_id',$vat2->f_id) }}>{{ $vat2->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_default_vat2_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/vat.f_default_vat2_id')</span>
                                <input type="checkbox" name="f_priority_in_integrations" class="form-check-input @error('f_priority_in_integrations') is-invalid @enderror" value="{{ old('f_priority_in_integrations',1) }}">
                            </label>
                            @error('f_priority_in_integrations') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
