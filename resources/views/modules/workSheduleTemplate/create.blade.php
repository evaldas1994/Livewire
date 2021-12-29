@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/workSheduleTemplate.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('work-shedule-template-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('work-shedule-templates.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="work-shedule-template-form" action="{{ route('work-shedule-templates.store') }}" method="POST">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/workSheduleTemplate.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id')}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_title')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_title') is-invalid @enderror"
                                   name="f_title"
                                   placeholder="@lang('modules/workSheduleTemplate.f_title')"
                                   maxlength="50"
                                   value="{{ old('f_title')}}">
                            @error('f_title') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_from')</label>
                            <input type="time"
                                   class="not-empty form-control form-control-sm time @error('f_from') is-invalid @enderror"
                                   name="f_from"
                                   placeholder="@lang('modules/workSheduleTemplate.f_from')"
                                   maxlength="20"
                                   value="{{ old('f_from')}}">
                            @error('f_from') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_till')</label>
                            <input type="time"
                                   class="not-empty form-control form-control-sm time @error('f_till') is-invalid @enderror"
                                   name="f_till"
                                   placeholder="@lang('modules/workSheduleTemplate.f_till')"
                                   maxlength="20"
                                   value="{{ old('f_till')}}">
                            @error('f_till') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_break_from')</label>
                            <input type="time"
                                   class="form-control form-control-sm time @error('f_break_from') is-invalid @enderror"
                                   name="f_break_from"
                                   placeholder="@lang('modules/workSheduleTemplate.f_break_from')"
                                   maxlength="20"
                                   value="{{ old('f_break_from')}}">
                            @error('f_break_from') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_break_till')</label>
                            <input type="time"
                                   class="form-control form-control-sm time @error('f_break_till') is-invalid @enderror"
                                   name="f_break_till"
                                   placeholder="@lang('modules/workSheduleTemplate.f_break_till')"
                                   maxlength="20"
                                   value="{{ old('f_break_till')}}">
                            @error('f_break_till') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_break_from2')</label>
                            <input type="time"
                                   class="form-control form-control-sm time @error('f_break_from2') is-invalid @enderror"
                                   name="f_break_from2"
                                   placeholder="@lang('modules/workSheduleTemplate.f_break_from2')"
                                   maxlength="20"
                                   value="{{ old('f_break_from2')}}">
                            @error('f_break_from2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/workSheduleTemplate.f_break_till2')</label>
                            <input type="time"
                                   class="form-control form-control-sm time @error('f_break_till2') is-invalid @enderror"
                                   name="f_break_till2"
                                   placeholder="@lang('modules/workSheduleTemplate.f_break_till2')"
                                   maxlength="20"
                                   value="{{ old('f_break_till2')}}">
                            @error('f_break_till2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
