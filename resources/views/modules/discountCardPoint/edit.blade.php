@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/discountCardPoint.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="discount_card_points_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="discount_card_points_edit_form"
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
                            <x-form-elements.select-array
                                form="discount_card_points_edit_form"
                                :items="$types"
                                name="f_type"
                                labelValue="modules/discountCardPoint.f_type"
                                selectValue="modules/discountCardPoint.type"
                                :defaultValue="$discountCardPoint->f_type"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="discount_card_points_edit_form"
                                name="f_discount_card"
                                labelValue="modules/discountCardPoint.f_discount_card"
                                inputClass="not-empty"
                                maxLength="20"
                                :defaultValue="$discountCardPoint->f_discount_card"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="discount_card_points_edit_form"
                                name="f_points"
                                labelValue="modules/discountCardPoint.f_points"
                                inputClass="not-empty"
                                maxLength="15"
                                :defaultValue="$discountCardPoint->f_points"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="discount_card_points_edit_form"
                                name="f_system1"
                                labelValue="modules/discountCardPoint.f_system1"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$discountCardPoint->f_system1"
                            />

                            <x-form-elements.input
                                form="discount_card_points_edit_form"
                                name="f_system2"
                                labelValue="modules/discountCardPoint.f_system2"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$discountCardPoint->f_system2"
                            />

                            <x-form-elements.input
                                form="discount_card_points_edit_form"
                                name="f_system3"
                                labelValue="modules/discountCardPoint.f_system3"
                                maxLength="100"
                                hidden="hidden"
                                :defaultValue="$discountCardPoint->f_system3"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="discount_card_points_edit_form"
            route="discount-card-points.update"
            :data="[$partner, $discountCardPoint]"
            method="PUT"
        />
    </div>
@endsection
