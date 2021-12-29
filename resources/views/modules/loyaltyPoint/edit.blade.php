@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto">
                <h1>@lang('modules/loyaltyPoint.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="loyalty_points_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="loyalty_points_edit_form"
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
                                <x-form-elements.input-date
                                    form="loyalty_points_edit_form"
                                    name="f_validity_points"
                                    labelValue="modules/loyaltyPoint.f_validity_points"
                                    :defaultValue="$loyaltyPoint->f_validity_points"
                                />

                                <x-form-elements.input-date
                                    form="loyalty_points_edit_form"
                                    name="f_use_points"
                                    labelValue="modules/loyaltyPoint.f_use_points"
                                    :defaultValue="$loyaltyPoint->f_use_points"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-date
                                    form="loyalty_points_edit_form"
                                    name="f_fix_points"
                                    labelValue="modules/loyaltyPoint.f_fix_points"
                                    inputClass="not-empty"
                                    :defaultValue="$loyaltyPoint->f_fix_points"
                                />

                                <x-form-elements.select-with-button
                                    form="loyalty_points_edit_form"
                                    :items="$partnerGroups"
                                    name="f_partner_groupid"
                                    labelValue="modules/loyaltyPoint.f_partner_groupid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-partner-group|f_partner_groupid"
                                    :defaultValue="$loyaltyPoint->f_partner_groupid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="loyalty_points_edit_form"
                                    name="f_discount_card"
                                    labelValue="modules/loyaltyPoint.f_discount_card"
                                    maxLength="20"
                                    :defaultValue="$loyaltyPoint->f_discount_card"
                                />

                                <x-form-elements.select-array
                                    form="loyalty_points_edit_form"
                                    :items="$operatorTypes"
                                    name="f_operator"
                                    labelValue="modules/loyaltyPoint.f_operator"
                                    selectValue="modules/loyaltyPoint.operator_type"
                                    :defaultValue="$loyaltyPoint->f_operator"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="loyalty_points_edit_form"
                                    name="f_system1"
                                    labelValue="modules/loyaltyPoint.f_system1"
                                    maxLength="100"
                                    readonly="readonly"
                                    :defaultValue="$loyaltyPoint->f_system1"
                                />

                                <x-form-elements.input
                                    form="account_create_form"
                                    name="f_system2"
                                    labelValue="modules/loyaltyPoint.f_system2"
                                    maxLength="100"
                                    readonly="readonly"
                                    :defaultValue="$loyaltyPoint->f_system2"
                                />

                                <x-form-elements.input
                                    form="account_create_form"
                                    name="f_system3"
                                    labelValue="modules/loyaltyPoint.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$loyaltyPoint->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="loyalty_points_edit_form"
            route="loyalty-points.update"
            :data="$loyaltyPoint"
            method="PUT"
        />
    </div>
@endsection
