@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/department.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="department_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="department_edit_form"
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
                                    form="department_edit_form"
                                    name="f_id"
                                    labelValue="modules/department.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                    :defaultValue="$department->f_id"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="department_edit_form"
                                    name="f_name"
                                    labelValue="modules/department.f_name"
                                    maxLength="100"
                                    :defaultValue="$department->f_name"
                                />

                                <x-form-elements.input
                                    form="department_edit_form"
                                    name="f_name2"
                                    labelValue="modules/department.f_name2"
                                    maxLength="100"
                                    :defaultValue="$department->f_name2"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="department_edit_form"
                                    :items="$accounts"
                                    name="f_accountid1"
                                    labelValue="modules/department.f_accountid1"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-account-1|f_accountid1"
                                    :defaultValue="$department->f_accountid1"
                                />

                                <x-form-elements.select-with-button
                                    form="department_edit_form"
                                    :items="$accounts"
                                    name="f_accountid2"
                                    labelValue="modules/department.f_accountid2"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-account-2|f_accountid2"
                                    :defaultValue="$department->f_accountid2"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="department_edit_form"
                                    :items="$employees"
                                    name="f_manager_id"
                                    labelValue="modules/department.f_manager_id"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-employee|f_manager_id"
                                    :defaultValue="$department->f_manager_id"
                                />

                                <x-form-elements.select-with-button
                                    form="department_edit_form"
                                    :items="$departments"
                                    name="f_parent_id"
                                    labelValue="modules/department.f_parent_id"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-department|f_parent_id"
                                    :defaultValue="$department->f_parent_id"
                                    disabled="disabled"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="department_edit_form"
                                    name="f_system1"
                                    labelValue="modules/department.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$department->f_system1"
                                />

                                <x-form-elements.input
                                    form="department_edit_form"
                                    name="f_system2"
                                    labelValue="modules/department.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$department->f_system2"
                                />

                                <x-form-elements.input
                                    form="department_edit_form"
                                    name="f_system3"
                                    labelValue="modules/department.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$department->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="department_edit_form"
            route="departments.update"
            :data="$department"
            method="PUT"
        />
    </div>
@endsection
