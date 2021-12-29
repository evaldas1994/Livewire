@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/customReason.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('custom-reason-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('custom-reasons.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="custom-reason-form" action="{{ route('custom-reasons.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/customReason.f_description')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_description') is-invalid @enderror"
                                           name="f_description"
                                           maxlength="100"
                                           value="{{ old('f_description')}}">
                                    @error('f_description') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/customReason.f_system1')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                           name="f_system1"
                                           maxlength="100"
                                           value="{{ old('f_system1') }}">
                                    @error('f_system1') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/customReason.f_system2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                           name="f_system2"
                                           maxlength="100"
                                           value="{{ old('f_system2') }}">
                                    @error('f_system2') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/customReason.f_system3')</label>
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
