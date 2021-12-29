@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto">
                <h1>@lang('modules/barcode.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="barcode_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="barcode_edit_form"
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
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input-id
                                    form="barcode_edit_form"
                                    name="f_id"
                                    labelValue="modules/barcode.f_id"
                                    maxLength="40"
                                    inputClass="not-empty"
                                    :defaultValue="$barcode->f_id"
                                />

                                <x-form-elements.select-with-button
                                    form="barcode_edit_form"
                                    :items="$stocks"
                                    name="f_stockid"
                                    labelValue="modules/barcode.f_stockid"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-stock|f_stockid"
                                    :defaultValue="$barcode->f_stockid"
                                />

                                <x-form-elements.checkbox-boolean
                                    form="barcode_edit_form"
                                    name="f_default"
                                    labelValue="modules/barcode.f_default"
                                    :defaultValue="$barcode->f_default"
                                />
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_ratio"
                                    labelValue="modules/barcode.f_ratio"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_ratio"
                                />

                                <x-form-elements.select-with-button
                                    form="barcode_edit_form"
                                    :items="$stocks"
                                    name="f_usadid"
                                    labelValue="modules/barcode.f_usadid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-usad|f_usadid"
                                    :defaultValue="$barcode->f_usadid"
                                />
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_neto"
                                    labelValue="modules/barcode.f_neto"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_neto"
                                />

                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_plastic"
                                    labelValue="modules/barcode.f_plastic"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_plastic"
                                />

                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_paper"
                                    labelValue="modules/barcode.f_paper"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_paper"
                                />
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_glass"
                                    labelValue="modules/barcode.f_glass"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_glass"
                                />

                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_wood"
                                    labelValue="modules/barcode.f_wood"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_wood"
                                />

                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_pap1"
                                    labelValue="modules/barcode.f_pap1"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_pap1"
                                />

                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_pap2"
                                    labelValue="modules/barcode.f_pap2"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_pap2"
                                />
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_system1"
                                    labelValue="modules/barcode.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$barcode->f_system1"
                                />

                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_system2"
                                    labelValue="modules/barcode.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$barcode->f_system2"
                                />

                                <x-form-elements.input
                                    form="barcode_edit_form"
                                    name="f_system3"
                                    labelValue="modules/barcode.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$barcode->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="barcode_edit_form"
            route="barcodes.update"
            :data="$barcode"
            method="PUT"
        />
    </div>
@endsection
