@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/account.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="account_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="account_edit_form"
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
                                    form="account_edit_form"
                                    name="f_id"
                                    labelValue="modules/account.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                    :defaultValue="$account->f_id"
                                />

                                <x-form-elements.input
                                    form="account_edit_form"
                                    name="f_name"
                                    labelValue="modules/account.f_name"
                                    maxLength="100"
                                    :defaultValue="$account->f_name"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="account_edit_form"
                                    :items="$accountGroups"
                                    name="f_groupid"
                                    labelValue="modules/account.f_groupid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-account-group|f_groupid"
                                    :defaultValue="$account->f_groupid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-array
                                    form="account_edit_form"
                                    :items="$types"
                                    name="f_type"
                                    labelValue="modules/account.f_type"
                                    selectValue="modules/account.type"
                                    :defaultValue="$account->f_type"
                                />

                                <x-form-elements.select-array
                                    form="account_edit_form"
                                    :items="$purposeTypes"
                                    name="f_purpose"
                                    labelValue="modules/account.f_purpose"
                                    selectValue="modules/account.purpose_type"
                                    :defaultValue="$account->f_purpose"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="account_edit_form"
                                    name="f_vmi_code"
                                    labelValue="modules/account.f_vmi_code"
                                    maxLength="10"
                                    :defaultValue="$account->f_vmi_code"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="account_edit_form"
                                    name="f_system1"
                                    labelValue="modules/account.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$account->f_system1"
                                />

                                <x-form-elements.input
                                    form="account_edit_form"
                                    name="f_system2"
                                    labelValue="modules/account.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$account->f_system2"
                                />

                                <x-form-elements.input
                                    form="account_edit_form"
                                    name="f_system3"
                                    labelValue="modules/account.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$account->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="account_edit_form"
            route="accounts.update"
            :data="$account"
            method="PUT"
        />
    </div>
@endsection
