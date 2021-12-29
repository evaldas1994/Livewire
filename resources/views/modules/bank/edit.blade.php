@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/bank.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="bank_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="bank_edit_form"
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
                                    form="bank_edit_form"
                                    name="f_id"
                                    labelValue="modules/bank.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                    :defaultValue="$bank->f_id"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="bank_edit_form"
                                    name="f_name"
                                    labelValue="modules/bank.f_name"
                                    maxLength="100"
                                    :defaultValue="$bank->f_name"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="bank_edit_form"
                                    name="f_bic"
                                    labelValue="modules/bank.f_bic"
                                    maxLength="20"
                                    :defaultValue="$bank->f_bic"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="bank_edit_form"
                                    name="f_code"
                                    labelValue="modules/bank.f_code"
                                    maxLength="20"
                                    :defaultValue="$bank->f_code"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="bank_edit_form"
                                    name="f_system1"
                                    labelValue="modules/bank.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$bank->f_system1"
                                />

                                <x-form-elements.input
                                    form="bank_edit_form"
                                    name="f_system2"
                                    labelValue="modules/bank.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$bank->f_system2"
                                />

                                <x-form-elements.input
                                    form="bank_edit_form"
                                    name="f_system3"
                                    labelValue="modules/bank.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$bank->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="bank_edit_form"
            route="banks.update"
            :data="$bank"
            method="PUT"
        />
    </div>
@endsection
