@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/blankNumber.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="blank_number_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="blank_number_create_form"
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
                                <x-form-elements.select-with-button
                                    form="blank_number_create_form"
                                    :items="$counters"
                                    name="f_counterid"
                                    labelValue="modules/blankNumber.f_counterid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-counter|f_counterid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="blank_number_create_form"
                                    :items="$stores"
                                    name="f_storeid"
                                    labelValue="modules/blankNumber.f_storeid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-store|f_storeid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="blank_number_create_form"
                                    :items="$stockOperationGroups"
                                    name="f_groupid"
                                    labelValue="modules/blankNumber.f_groupid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-stock-operation-group|f_groupid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-array
                                    form="blank_number_create_form"
                                    :items="$opTypes"
                                    name="f_op"
                                    labelValue="modules/blankNumber.f_op"
                                    selectValue="modules/blankNumber.operation_type"
                                />

                                <x-form-elements.select-array
                                    form="blank_number_create_form"
                                    :items="$invoiceRegisterTypes"
                                    name="f_invoice_register"
                                    labelValue="modules/blankNumber.f_invoice_register"
                                    selectValue="modules/blankNumber.invoice_register_type"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="blank_number_create_form"
                                    name="f_system1"
                                    labelValue="modules/blankNumber.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="blank_number_create_form"
                                    name="f_system2"
                                    labelValue="modules/blankNumber.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="blank_number_create_form"
                                    name="f_system3"
                                    labelValue="modules/blankNumber.f_system3"
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
            id="blank_number_create_form"
            route="blank-numbers.store"
            method="POST"
        />
    </div>
@endsection
