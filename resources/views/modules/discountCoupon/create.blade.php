@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/discountCoupon.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="discount_coupon_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="discount_coupon_create_form"
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
                                form="discount_coupon_create_form"
                                name="f_id"
                                labelValue="modules/discountCoupon.f_id"
                                inputClass="not-empty"
                                wireModel="f_id"
                            />

                            <x-form-elements.input-date
                                form="discount_coupon_create_form"
                                name="f_activation_date"
                                labelValue="modules/discountCoupon.f_activation_date"
                            />

                            <x-form-elements.checkbox-boolean
                                form="discount_coupon_create_form"
                                name="f_active"
                                labelValue="modules/discountCoupon.f_active"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_activation_docno"
                                labelValue="modules/discountCoupon.f_activation_docno"
                                maxLength="20"
                                readonly="readonly"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_activation_partnerid"
                                labelValue="modules/discountCoupon.f_activation_partnerid"
                                maxLength="20"
                                readonly="readonly"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_activation_storeid"
                                labelValue="modules/discountCoupon.f_activation_storeid"
                                maxLength="15"
                                readonly="readonly"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_nominal"
                                labelValue="modules/discountCoupon.f_nominal"
                                maxLength="20"
                                defaultValue="0.0000"
                            />

                            <x-form-elements.input-date
                                form="discount_coupon_create_form"
                                name="f_sale_date"
                                labelValue="modules/discountCoupon.f_sale_date"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_sale_docno"
                                labelValue="modules/discountCoupon.f_sale_docno"
                                maxLength="20"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_valid_days"
                                labelValue="modules/discountCoupon.f_valid_days"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_sale_partnerid"
                                labelValue="modules/discountCoupon.f_sale_partnerid"
                                maxLength="20"
                                readonly="readonly"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_sale_storeid"
                                labelValue="modules/discountCoupon.f_sale_storeid"
                                maxLength="20"
                                readonly="readonly"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_sale_sum"
                                labelValue="modules/discountCoupon.f_sale_sum"
                                maxLength="20"
                                defaultValue="0.0000"
                                readonly="readonly"
                            />

                            <x-form-elements.input-date
                                form="discount_coupon_create_form"
                                name="f_valid_till"
                                labelValue="modules/discountCoupon.f_valid_till"
                                disabled="disabled"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_system1"
                                labelValue="modules/discountCoupon.f_system1"
                                maxLength="100"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_system2"
                                labelValue="modules/discountCoupon.f_system2"
                                maxLength="100"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="discount_coupon_create_form"
                                name="f_system3"
                                labelValue="modules/discountCoupon.f_system3"
                                maxLength="100"
                                hidden="hidden"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="discount_coupon_create_form"
            route="discount-coupons.store"
            method="POST"
        />
    </div>
@endsection
