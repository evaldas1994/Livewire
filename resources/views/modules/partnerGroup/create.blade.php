@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto">
                <h1>@lang('modules/partnerGroup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="partner_group_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="partner_group_create_form"
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
                                    form="partner_group_create_form"
                                    name="f_id"
                                    labelValue="modules/partnerGroup.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="partner_group_create_form"
                                    name="f_name"
                                    labelValue="modules/partnerGroup.f_name"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="partner_group_create_form"
                                    name="f_name2"
                                    labelValue="modules/partnerGroup.f_name2"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.checkbox-boolean
                                    form="partner_group_create_form"
                                    name="f_import"
                                    labelValue="modules/partnerGroup.f_import"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="partner_group_create_form"
                                    name="f_system1"
                                    labelValue="modules/partnerGroup.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="partner_group_create_form"
                                    name="f_system2"
                                    labelValue="modules/partnerGroup.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="partner_group_create_form"
                                    name="f_system3"
                                    labelValue="modules/partnerGroup.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="partner_group_create_form"
            route="partner-groups.store"
            method="POST"
        />
    </div>
@endsection
