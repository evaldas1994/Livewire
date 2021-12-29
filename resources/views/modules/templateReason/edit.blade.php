@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/templateReason.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="template_reason_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="template_reason_edit_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="template_reason_edit_form"
                                name="f_description"
                                labelValue="modules/templateReason.f_description"
                                maxLength="100"
                                :defaultValue="$templateReason->f_description"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="template_reason_edit_form"
                                name="f_system1"
                                labelValue="modules/stock.f_system1"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$templateReason->f_system1"
                            />

                            <x-form-elements.input
                                form="template_reason_edit_form"
                                name="f_system2"
                                labelValue="modules/stock.f_system2"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$templateReason->f_system2"
                            />

                            <x-form-elements.input
                                form="template_reason_edit_form"
                                name="f_system3"
                                labelValue="modules/stock.f_system3"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$templateReason->f_system3"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="template_reason_edit_form"
            route="template-reasons.update"
            :data="[$template, $templateReason]"
            method="PUT"
        />
    </div>

@endsection
