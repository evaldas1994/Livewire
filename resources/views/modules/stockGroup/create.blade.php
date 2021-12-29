@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/stockGroup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="stock_group_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="stock_group_create_form"
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
                                    form="stock_group_create_form"
                                    name="f_id"
                                    labelValue="modules/stockGroup.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_name"
                                    labelValue="modules/stockGroup.f_name"
                                    maxLength="100"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_name2"
                                    labelValue="modules/stockGroup.f_name2"
                                    maxLength="100"
                                />

                                <x-form-elements.checkbox-boolean
                                    form="stock_group_create_form"
                                    name="f_catalog_group"
                                    labelValue="modules/stockGroup.f_catalog_group"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <h4 class="form-label">@lang('modules/stockGroup.allowed')</h4>

                                <x-form-elements.input-time
                                    form="stock_group_create_form"
                                    name="f_allowed_from"
                                    labelValue="modules/stockGroup.f_allowed_from"
                                />

                                <x-form-elements.input-time
                                    form="stock_group_create_form"
                                    name="f_allowed_to"
                                    labelValue="modules/stockGroup.f_allowed_to"
                                />

                                <x-form-elements.checkbox-boolean
                                    form="stock_group_create_form"
                                    name="f_ignore_promotion"
                                    labelValue="modules/stockGroup.f_ignore_promotion"
                                />

                                <x-form-elements.checkbox-boolean
                                    form="stock_group_create_form"
                                    name="f_perishable_goods"
                                    labelValue="modules/stockGroup.f_perishable_goods"
                                />

                                <x-form-elements.checkbox-boolean
                                    form="stock_group_create_form"
                                    name="f_ignore_voucher"
                                    labelValue="modules/stockGroup.f_ignore_voucher"
                                />

                                <x-form-elements.select-with-button
                                    form="stock_group_create_form"
                                    :items="$stockGroups"
                                    name="f_group_parent"
                                    labelValue="modules/stockGroup.f_group_parent"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-stock-group|f_group_parent"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_group_level"
                                    labelValue="modules/stockGroup.f_group_level"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <h4 class="form-label">@lang('modules/stockGroup.self_service')</h4>

                                <x-form-elements.checkbox-boolean
                                    form="stock_group_create_form"
                                    name="f_age_restriction"
                                    labelValue="modules/stockGroup.f_age_restriction"
                                />

                                <x-form-elements.checkbox-boolean
                                    form="stock_group_create_form"
                                    name="f_ignor_gross_weight"
                                    labelValue="modules/stockGroup.f_ignor_gross_weight"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_disp_priority"
                                    labelValue="modules/stockGroup.f_disp_priority"
                                    maxLength="100"
                                    defaultValue="0"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_imgurl"
                                    labelValue="modules/stockGroup.f_imgurl"
                                    maxLength="400"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <h4 class="form-label">@lang('modules/stockGroup.short_group_name')</h4>

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_name_short_lt"
                                    labelValue="modules/stockGroup.f_name_short_lt"
                                    maxLength="100"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_name_short_en"
                                    labelValue="modules/stockGroup.f_name_short_en"
                                    maxLength="100"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_name_short_ru"
                                    labelValue="modules/stockGroup.f_name_short_ru"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_system1"
                                    labelValue="modules/stockGroup.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_system2"
                                    labelValue="modules/stockGroup.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="stock_group_create_form"
                                    name="f_system3"
                                    labelValue="modules/stockGroup.f_system3"
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
            id="stock_group_create_form"
            route="stock-groups.store"
            method="POST"
        />
    </div>
@endsection
