@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/productionGroup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="production_group_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="production_group_edit_form"
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
                                form="production_group_edit_form"
                                name="f_id"
                                labelValue="modules/productionGroup.f_id"
                                inputClass="not-empty"
                                :defaultValue="$productionGroup->f_id"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="production_group_edit_form"
                                name="f_name"
                                labelValue="modules/productionGroup.f_name"
                                maxLength="100"
                                :defaultValue="$productionGroup->f_name"
                            />

                            <x-form-elements.input
                                form="production_group_edit_form"
                                name="f_name2"
                                labelValue="modules/productionGroup.f_name2"
                                maxLength="100"
                                :defaultValue="$productionGroup->f_name2"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-with-button
                                form="production_group_edit_form"
                                :items="$templates"
                                name="f_templateid1"
                                labelValue="modules/productionGroup.f_templateid1"
                                buttonName="button-action-without-validation"
                                buttonValue="select-template1|f_templateid1"
                                :defaultValue="$productionGroup->f_templateid1"
                            />

                            <x-form-elements.select-with-button
                                form="production_group_edit_form"
                                :items="$templates"
                                name="f_templateid2"
                                labelValue="modules/productionGroup.f_templateid2"
                                buttonName="button-action-without-validation"
                                buttonValue="select-template2|f_templateid2"
                                :defaultValue="$productionGroup->f_templateid2"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="production_group_edit_form"
                                name="f_system1"
                                labelValue="modules/productionGroup.f_system1"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$productionGroup->f_system1"
                            />

                            <x-form-elements.input
                                form="production_group_edit_form"
                                name="f_system2"
                                labelValue="modules/productionGroup.f_system2"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$productionGroup->f_system2"
                            />

                            <x-form-elements.input
                                form="production_group_edit_form"
                                name="f_system3"
                                labelValue="modules/productionGroup.f_system3"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$productionGroup->f_system3"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="production_group_edit_form"
            route="production-groups.update"
            :data="$productionGroup"
            method="PUT"
        />
    </div>

@endsection
