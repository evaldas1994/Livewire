@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/partner.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="partner_create_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="partner_create_form"
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
                            <x-modules.tabs-list
                                lang="modules/partner.tab"
                                count="7"
                            />
                        </div>

                        <div class="row">
                            <div class="tab tab-content mt-2">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                    <div class="row">
                                            <div class="col-12 col-md-6 col-xl-3">
                                                <x-form-elements.input-id
                                                    form="partner_create_form"
                                                    name="f_id"
                                                    labelValue="modules/partner.f_id"
                                                    maxLength="20"
                                                    inputClass="not-empty"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_name"
                                                    labelValue="modules/partner.f_name"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_name2"
                                                    labelValue="modules/partner.f_name2"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$partnerGroups"
                                                    name="f_groupid"
                                                    labelValue="modules/partner.f_groupid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-partner-group|f_groupid"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_code"
                                                    labelValue="modules/partner.f_code"
                                                    maxLength="20"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_vat_code"
                                                    labelValue="modules/partner.f_vat_code"
                                                    maxLength="20"
                                                />

                                                <x-form-elements.select-array
                                                    form="partner_create_form"
                                                    :items="$legalStatuses"
                                                    name="f_legal_status"
                                                    labelValue="modules/partner.f_legal_status"
                                                    selectValue="modules/partner.legal_status_type"
                                                />

                                                <x-form-elements.checkbox-boolean
                                                    form="partner_create_form"
                                                    name="f_buyer"
                                                    labelValue="modules/partner.f_buyer"
                                                />

                                                <x-form-elements.checkbox-boolean
                                                    form="partner_create_form"
                                                    name="f_seller"
                                                    labelValue="modules/partner.f_seller"
                                                />

                                                <x-form-elements.checkbox-boolean
                                                    form="partner_create_form"
                                                    name="f_locked"
                                                    labelValue="modules/partner.f_locked"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-3">
                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_person"
                                                    labelValue="modules/partner.f_person"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_post"
                                                    labelValue="modules/partner.f_post"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_phone"
                                                    labelValue="modules/partner.f_phone"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_fax"
                                                    labelValue="modules/partner.f_fax"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_email"
                                                    labelValue="modules/partner.f_email"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_address"
                                                    labelValue="modules/partner.f_address"
                                                    maxLength="100"
                                                />

                                                <x-form-elements.select-array
                                                    form="partner_create_form"
                                                    :items="$priceLevels"
                                                    name="f_price_level"
                                                    labelValue="modules/partner.f_price_level"
                                                    selectValue="modules/partner.price_level_type"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$partners"
                                                    name="f_partnerid"
                                                    labelValue="modules/partner.f_partnerid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-partner|f_partnerid"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$accounts"
                                                    name="f_accountid1"
                                                    labelValue="modules/partner.f_accountid1"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-account-1|f_accountid1"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$accounts"
                                                    name="f_accountid2"
                                                    labelValue="modules/partner.f_accountid2"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-account-2|f_accountid2"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-3">
                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$messageGroups"
                                                    name="f_messagegroupid"
                                                    labelValue="modules/partner.f_messagegroupid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-message-group|f_messagegroupid"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$currencies"
                                                    name="f_curid"
                                                    labelValue="modules/partner.f_curid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-currency|f_curid"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_credit"
                                                    labelValue="modules/partner.f_credit"
                                                    maxLength="15"
                                                    defaultValue="0.00"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_pay_days"
                                                    labelValue="modules/partner.f_pay_days"
                                                    defaultValue="0"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_discount_card"
                                                    labelValue="modules/partner.f_discount_card"
                                                />

                                                <x-form-elements.checkbox-boolean
                                                    form="partner_create_form"
                                                    name="f_discount_card_active"
                                                    labelValue="modules/partner.f_discount_card_active"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_discount_card_balance"
                                                    labelValue="modules/partner.f_discount_card_balance"
                                                    maxLength="15"
                                                    defaultValue="0.00"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_discount_card_balance2"
                                                    labelValue="modules/partner.f_discount_card_balance2"
                                                    maxLength="15"
                                                    defaultValue="0.00"
                                                />

                                                <x-form-elements.input
                                                    form="partner_create_form"
                                                    name="f_discount_card_balance3"
                                                    labelValue="modules/partner.f_discount_card_balance3"
                                                    maxLength="15"
                                                    defaultValue="0.00"
                                                />

                                                <x-form-elements.input-date
                                                    form="partner_create_form"
                                                    name="f_discount_card_balance3_date"
                                                    labelValue="modules/partner.f_discount_card_balance3_date"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-3">
                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$vats"
                                                    name="f_vatid"
                                                    labelValue="modules/partner.f_vatid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-vat|f_vatid"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$registers1"
                                                    name="f_r1id"
                                                    labelValue="modules/partner.f_r1id"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-register-1|f_r1id"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$registers2"
                                                    name="f_r2id"
                                                    labelValue="modules/partner.f_r2id"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-register-2|f_r2id"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$registers3"
                                                    name="f_r3id"
                                                    labelValue="modules/partner.f_r3id"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-register-3|f_r3id"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$registers4"
                                                    name="f_r4id"
                                                    labelValue="modules/partner.f_r4id"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-register-4|f_r4id"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$registers5"
                                                    name="f_r5id"
                                                    labelValue="modules/partner.f_r5id"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-register-5|f_r5id"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$departments"
                                                    name="f_departmentid"
                                                    labelValue="modules/partner.f_departmentid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-department|f_departmentid"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$persons"
                                                    name="f_personid"
                                                    labelValue="modules/partner.f_personid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-person|f_personid"
                                                />

                                                <x-form-elements.select-with-button
                                                    form="partner_create_form"
                                                    :items="$projects"
                                                    name="f_projectid"
                                                    labelValue="modules/partner.f_projectid"
                                                    buttonName="button-action-without-validation"
                                                    buttonValue="select-project|f_projectid"
                                                />
                                            </div>
                                        </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_f1"
                                                labelValue="modules/partner.f_f1"
                                                maxLength="1000"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_f2"
                                                labelValue="modules/partner.f_f2"
                                                maxLength="1000"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_f3"
                                                labelValue="modules/partner.f_f3"
                                                maxLength="1000"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_f4"
                                                labelValue="modules/partner.f_f4"
                                                maxLength="1000"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_f5"
                                                labelValue="modules/partner.f_f5"
                                                maxLength="1000"
                                            />

                                            <x-form-elements.select-array
                                                form="partner_create_form"
                                                :items="$sexTypes"
                                                name="f_sex"
                                                labelValue="modules/partner.f_sex"
                                                selectValue="modules/partner.sex_type"
                                            />

                                            <x-form-elements.input-date
                                                form="partner_create_form"
                                                name="f_birthday"
                                                labelValue="modules/partner.f_birthday"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_country"
                                                labelValue="modules/partner.f_country"
                                                maxLength="1000"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_mark1"
                                                labelValue="modules/partner.f_mark1"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_mark2"
                                                labelValue="modules/partner.f_mark2"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_mark3"
                                                labelValue="modules/partner.f_mark3"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_mark4"
                                                labelValue="modules/partner.f_mark4"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_mark5"
                                                labelValue="modules/partner.f_mark5"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_notgenerate_sale_price"
                                                labelValue="modules/partner.f_notgenerate_sale_price"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_notgenerate_purch_price"
                                                labelValue="modules/partner.f_notgenerate_purch_price"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_send_on_increase"
                                                labelValue="modules/partner.f_send_on_increase"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_send_on_decrease"
                                                labelValue="modules/partner.f_send_on_decrease"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_send_weekly"
                                                labelValue="modules/partner.f_send_weekly"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_direct_debit"
                                                labelValue="modules/partner.f_direct_debit"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_pay_in_cash"
                                                labelValue="modules/partner.f_pay_in_cash"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                form="partner_create_form"
                                                name="f_use_pay_days"
                                                labelValue="modules/partner.f_use_pay_days"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-with-button
                                                form="partner_create_form"
                                                :items="$banks"
                                                name="f_direct_debit_bank"
                                                labelValue="modules/partner.f_direct_debit_bank"
                                                buttonName="button-action-without-validation"
                                                buttonValue="select-direct-debit-bank|f_direct_debit_bank"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_direct_debit_code"
                                                labelValue="modules/partner.f_direct_debit_code"
                                                maxLength="20"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_direct_debit_no"
                                                labelValue="modules/partner.f_direct_debit_no"
                                                maxLength="20"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_act_url"
                                                labelValue="modules/partner.f_act_url"
                                                maxLength="100"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_direct_debit_limit"
                                                labelValue="modules/partner.f_direct_debit_limit"
                                                maxLength="15"
                                                defaultValue="0.00"
                                            />

                                            <x-form-elements.select-array
                                                form="partner_create_form"
                                                :items="$ediExportTypes"
                                                name="f_edi_export"
                                                labelValue="modules/partner.f_edi_export"
                                                selectValue="modules/partner.edi_export_type"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.input-date
                                                form="partner_create_form"
                                                name="f_direct_debit_date1"
                                                labelValue="modules/partner.f_direct_debit_date1"
                                            />

                                            <x-form-elements.input-date
                                                form="partner_create_form"
                                                name="f_direct_debit_date2"
                                                labelValue="modules/partner.f_direct_debit_date2"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_iln_edisoft"
                                                labelValue="modules/partner.f_iln_edisoft"
                                                maxLength="20"
                                            />

                                            <x-form-elements.select-with-button
                                                form="partner_create_form"
                                                :items="$stores"
                                                name="f_edi_storeid"
                                                labelValue="modules/partner.f_edi_storeid"
                                                buttonName="button-action-without-validation"
                                                buttonValue="select-edi-store|f_edi_storeid"
                                            />

                                            <x-form-elements.input
                                                form="partner_create_form"
                                                name="f_edi_delivery_iln"
                                                labelValue="modules/partner.f_edi_delivery_iln"
                                                maxLength="20"
                                            />

                                            <x-form-elements.select-with-button
                                                form="partner_create_form"
                                                :items="$templates"
                                                name="f_templateid"
                                                labelValue="modules/partner.f_templateid"
                                                buttonName="button-action-without-validation"
                                                buttonValue="select-template|f_templateid"
                                            />

                                            <x-form-elements.select-with-button
                                                form="partner_create_form"
                                                :items="$templates"
                                                name="f_templateid2"
                                                labelValue="modules/partner.f_templateid2"
                                                buttonName="button-action-without-validation"
                                                buttonValue="select-template-2|f_templateid2"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-3">
                                            1
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            2
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            3
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            4
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-4" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-3">
                                            1
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            2
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            3
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            4
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-5" role="tabpanel">
                                    <div class="col-auto">
                                        <x-form-elements.button
                                            form="partner_create_form"
                                            class="btn-primary"
                                            name="button-action"
                                            value="discount-card-point-create"
                                            fontawesomeIcon="fas fa-plus"
                                            text="global.btn_new"
                                        />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-6" role="tabpanel">
                                    <div class="col-auto">
                                        <x-form-elements.button
                                            form="partner_create_form"
                                            class="btn-primary"
                                            name="button-action"
                                            value="contact-create"
                                            fontawesomeIcon="fas fa-plus"
                                            text="global.btn_new"
                                        />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-7" role="tabpanel">
                                    <div class="row">
                                        <div class="col-auto">
                                            <x-form-elements.button
                                                form="partner_create_form"
                                                class="btn-primary"
                                                name="button-action"
                                                value="bank-account-create"
                                                fontawesomeIcon="fas fa-plus"
                                                text="global.btn_new"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="partner_create_form"
            route="partners.store"
            method="POST"
        />
    </div>
@endsection
