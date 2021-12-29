@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/ledgerGroup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="ledger_group_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="ledger_group_edit_form"
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
                                    form="ledger_group_edit_form"
                                    name="f_id"
                                    labelValue="modules/ledgerGroup.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                    :defaultValue="$ledgerGroup->f_id"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="ledger_group_edit_form"
                                    name="f_name"
                                    labelValue="modules/ledgerGroup.f_name"
                                    maxLength="100"
                                    :defaultValue="$ledgerGroup->f_name"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="ledger_group_edit_form"
                                    :items="$accounts"
                                    name="f_accountid"
                                    labelValue="modules/ledgerGroup.f_accountid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-account|f_accountid"
                                    :defaultValue="$ledgerGroup->f_accountid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="ledger_group_edit_form"
                                    name="f_system1"
                                    labelValue="modules/ledgerGroup.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$ledgerGroup->f_system1"
                                />

                                <x-form-elements.input
                                    form="ledger_group_edit_form"
                                    name="f_system2"
                                    labelValue="modules/ledgerGroup.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$ledgerGroup->f_system2"
                                />

                                <x-form-elements.input
                                    form="ledger_group_edit_form"
                                    name="f_system3"
                                    labelValue="modules/ledgerGroup.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$ledgerGroup->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="ledger_group_edit_form"
            route="ledger-groups.update"
            :data="$ledgerGroup"
            method="PUT"
        />
    </div>
@endsection
