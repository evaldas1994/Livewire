@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/paymentGroup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="payment_group_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="payment_group_create_form"
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
                            <x-form-elements.input-id
                                form="payment_group_create_form"
                                name="f_id"
                                labelValue="modules/paymentGroup.f_id"
                                inputClass="not-empty"
                            />

                            <x-form-elements.input
                                form="payment_group_create_form"
                                name="f_name"
                                labelValue="modules/paymentGroup.f_name"
                                maxLength="100"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-array
                                form="payment_group_create_form"
                                :items="$operationTypes"
                                name="f_op"
                                labelValue="modules/paymentGroup.f_op"
                                selectValue="modules/paymentGroup.operation_type"
                            />

                            <x-form-elements.select-array
                                form="payment_group_create_form"
                                :items="$types"
                                name="f_type"
                                labelValue="modules/paymentGroup.f_type"
                                selectValue="modules/paymentGroup.type"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-with-button
                                form="payment_group_create_form"
                                :items="$accounts"
                                name="f_deb_accountid"
                                labelValue="modules/paymentGroup.f_deb_accountid"
                                buttonName="button-action-without-validation"
                                buttonValue="select-debit-account|f_deb_accountid"
                            />

                            <x-form-elements.select-with-button
                                form="payment_group_create_form"
                                :items="$accounts"
                                name="f_cred_accountid"
                                labelValue="modules/paymentGroup.f_cred_accountid"
                                buttonName="button-action-without-validation"
                                buttonValue="select-credit-account|f_cred_accountid"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-with-button
                                form="payment_group_create_form"
                                :items="$counters"
                                name="f_counterid"
                                labelValue="modules/paymentGroup.f_counterid"
                                buttonName="button-action-without-validation"
                                buttonValue="select-counter|f_counterid"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="payment_group_create_form"
                                name="f_system1"
                                labelValue="modules/paymentGroup.f_system1"
                                maxLength="100"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="payment_group_create_form"
                                name="f_system2"
                                labelValue="modules/paymentGroup.f_system2"
                                maxLength="100"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="payment_group_create_form"
                                name="f_system3"
                                labelValue="modules/paymentGroup.f_system3"
                                maxLength="100"
                                hidden="hidden"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="payment_group_create_form"
            route="payment-groups.store"
            method="POST"
        />
    </div>

@endsection
