@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/period.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="period_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="period_edit_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-id
                                    form="period_edit_form"
                                    name="f_id"
                                    labelValue="modules/period.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                    :defaultValue="$period->f_id"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="period_edit_form"
                                    name="f_name"
                                    labelValue="modules/period.f_name"
                                    maxLength="100"
                                    :defaultValue="$period->f_name"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-date
                                    form="period_edit_form"
                                    name="f_begin"
                                    labelValue="modules/period.f_begin"
                                    :defaultValue="$period->f_begin"
                                />

                                <x-form-elements.input-date
                                    form="period_edit_form"
                                    name="f_end"
                                    labelValue="modules/period.f_end"
                                    :defaultValue="$period->f_end"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.checkbox-boolean
                                    form="period_edit_form"
                                    name="f_closed"
                                    labelValue="modules/period.f_closed"
                                    :defaultValue="$period->f_closed"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="period_edit_form"
                                    name="f_system1"
                                    labelValue="modules/period.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$period->f_system1"
                                />

                                <x-form-elements.input
                                    form="period_edit_form"
                                    name="f_system2"
                                    labelValue="modules/period.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$period->f_system2"
                                />

                                <x-form-elements.input
                                    form="period_edit_form"
                                    name="f_system3"
                                    labelValue="modules/period.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$period->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="period_edit_form"
            route="periods.update"
            :data="$period"
            method="PUT"
        />
    </div>
@endsection
