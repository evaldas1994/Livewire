@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/markup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="markup_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="markup_edit_form"
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
                                    form="markup_edit_form"
                                    :items="$stocks"
                                    name="f_stockid"
                                    labelValue="modules/markup.f_stockid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-stock|f_stockid"
                                    :defaultValue="$markup->f_stockid"
                                />

                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$stockGroups"
                                    name="f_groupid"
                                    labelValue="modules/markup.f_groupid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-stock-group|f_groupid"
                                    :defaultValue="$markup->f_groupid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$partners"
                                    name="f_partnerid"
                                    labelValue="modules/markup.f_partnerid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-partner|f_partnerid"
                                    :defaultValue="$markup->f_partnerid"
                                />

                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$stores"
                                    name="f_storeid"
                                    labelValue="modules/markup.f_storeid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-store|f_storeid"
                                    :defaultValue="$markup->f_storeid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="markup_edit_form"
                                    name="f_markup_perc"
                                    labelValue="modules/markup.f_markup_perc"
                                    maxLength="15"
                                    :defaultValue="$markup->f_markup_perc"
                                />

                                <x-form-elements.checkbox-boolean
                                    form="markup_edit_form"
                                    name="f_include_vat"
                                    labelValue="modules/markup.f_include_vat"
                                    :defaultValue="$markup->f_include_vat"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$registers1"
                                    name="f_r1id"
                                    labelValue="modules/markup.f_r1id"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-register-1|f_r1id"
                                    :defaultValue="$markup->f_r1id"
                                />

                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$registers2"
                                    name="f_r2id"
                                    labelValue="modules/markup.f_r2id"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-register-2|f_r2id"
                                    :defaultValue="$markup->f_r2id"
                                />

                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$registers3"
                                    name="f_r3id"
                                    labelValue="modules/markup.f_r3id"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-register-3|f_r3id"
                                    :defaultValue="$markup->f_r3id"
                                />

                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$registers4"
                                    name="f_r4id"
                                    labelValue="modules/markup.f_r4id"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-register-4|f_r4id"
                                    :defaultValue="$markup->f_r4id"
                                />

                                <x-form-elements.select-with-button
                                    form="markup_edit_form"
                                    :items="$registers5"
                                    name="f_r5id"
                                    labelValue="modules/markup.f_r5id"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-register-5|f_r5id"
                                    :defaultValue="$markup->f_r5id"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="markup_edit_form"
                                    name="f_system1"
                                    labelValue="modules/markup.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$markup->f_system1"
                                />

                                <x-form-elements.input
                                    form="markup_edit_form"
                                    name="f_system2"
                                    labelValue="modules/markup.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$markup->f_system2"
                                />

                                <x-form-elements.input
                                    form="markup_edit_form"
                                    name="f_system3"
                                    labelValue="modules/markup.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$markup->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="markup_edit_form"
            route="markups.update"
            :data="$markup"
            method="PUT"
        />
    </div>
@endsection
