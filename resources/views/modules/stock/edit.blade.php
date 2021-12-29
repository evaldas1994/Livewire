@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/stock.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="stock_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="stock_edit_form"
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
                            lang="modules/stock.tab"
                            count="7"
                        />
                    </div>

                    <div class="row">
                        <div class="tab tab-content mt-2">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input-id
                                            form="stock_edit_form"
                                            name="f_id"
                                            labelValue="modules/stock.f_id"
                                            maxLength="40"
                                            inputClass="not-empty"
                                            :defaultValue="$stock->f_id"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_name"
                                            labelValue="modules/stock.f_name"
                                            maxLength="500"
                                            :defaultValue="$stock->f_name"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_name2"
                                            labelValue="modules/stock.f_name2"
                                            maxLength="100"
                                            :defaultValue="$stock->f_name2"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$stockGroups"
                                            name="f_groupid"
                                            labelValue="modules/stock.f_groupid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-stock-group|f_groupid"
                                            :defaultValue="$stock->f_groupid"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$units"
                                            name="f_unitid"
                                            labelValue="modules/stock.f_unitid"
                                            selectClass="not-empty"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-unit|f_unitid"
                                            :defaultValue="$stock->f_unitid"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$units"
                                            name="f_pack_unitid"
                                            labelValue="modules/stock.f_pack_unitid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-pack-unit|f_pack_unitid"
                                            :defaultValue="$stock->f_pack_unitid"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_pack_quant"
                                            labelValue="modules/stock.f_pack_quant"
                                            maxLength="15"
                                            :defaultValue="$stock->f_pack_quant"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_volume"
                                            labelValue="modules/stock.f_volume"
                                            maxLength="15"
                                            :defaultValue="$stock->f_volume"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_weight"
                                            labelValue="modules/stock.f_weight"
                                            maxLength="15"
                                            :defaultValue="$stock->f_weight"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_min_quant"
                                            labelValue="modules/stock.f_min_quant"
                                            maxLength="15"
                                            :defaultValue="$stock->f_min_quant"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_valid_days"
                                            labelValue="modules/stock.f_valid_days"
                                            maxLength="100"
                                            :defaultValue="$stock->f_valid_days"
                                        />

                                        <x-form-elements.input-date
                                            form="stock_edit_form"
                                            name="f_valid_date"
                                            labelValue="modules/stock.f_valid_date"
                                            :defaultValue="$stock->f_valid_date"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_packing"
                                            labelValue="modules/stock.f_packing"
                                            maxLength="100"
                                            :defaultValue="$stock->f_packing"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_originating"
                                            labelValue="modules/stock.f_originating"
                                            maxLength="100"
                                            :defaultValue="$stock->f_originating"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$manufacturers"
                                            name="f_manufacturerid"
                                            labelValue="modules/stock.f_manufacturerid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-manufacturer|f_manufacturerid"
                                            :defaultValue="$stock->f_manufacturerid"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_price_sale1"
                                            labelValue="modules/stock.f_price_sale1"
                                            maxLength="15"
                                            :defaultValue="$stock->f_price_sale1"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_price_sale2"
                                            labelValue="modules/stock.f_price_sale2"
                                            maxLength="15"
                                            :defaultValue="$stock->f_price_sale2"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_price_sale3"
                                            labelValue="modules/stock.f_price_sale3"
                                            maxLength="15"
                                            :defaultValue="$stock->f_price_sale3"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_price_sale4"
                                            labelValue="modules/stock.f_price_sale4"
                                            maxLength="15"
                                            :defaultValue="$stock->f_price_sale4"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_price_sale5"
                                            labelValue="modules/stock.f_price_sale5"
                                            maxLength="15"
                                            :defaultValue="$stock->f_price_sale5"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$discountsh"
                                            name="f_discid"
                                            labelValue="modules/stock.f_discid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-discount|f_discid"
                                            :defaultValue="$stock->f_discid"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_price_purch"
                                            labelValue="modules/stock.f_price_purch"
                                            maxLength="15"
                                            :defaultValue="$stock->f_price_purch"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_vat_perc"
                                            labelValue="modules/stock.f_vat_perc"
                                            maxLength="100"
                                            :defaultValue="$stock->f_vat_perc"
                                            readonly="readonly"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$vats"
                                            name="f_vatid"
                                            labelValue="modules/stock.f_vatid"
                                            selectClass="not-empty"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-vat|f_vatid"
                                            :defaultValue="$stock->f_vatid"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$stockGroups"
                                            name="f_alternative_group_id"
                                            labelValue="modules/stock.f_alternative_group_id"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-alternative-group|f_alternative_group_id"
                                            :defaultValue="$stock->f_alternative_group_id"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_partner_discount"
                                            labelValue="modules/stock.f_partner_discount"
                                            maxLength="15"
                                            :defaultValue="$stock->f_discid"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_gross_weight"
                                            labelValue="modules/stock.f_gross_weight"
                                            maxLength="15"
                                            :defaultValue="$stock->f_gross_weight"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_stock_text1"
                                            labelValue="modules/stock.f_stock_text1"
                                            maxLength="200"
                                            :defaultValue="$stock->f_stock_text1"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_stock_text2"
                                            labelValue="modules/stock.f_stock_text2"
                                            maxLength="30"
                                            :defaultValue="$stock->f_stock_text2"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_stock_text3"
                                            labelValue="modules/stock.f_stock_text3"
                                            maxLength="30"
                                            :defaultValue="$stock->f_stock_text3"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.select-array
                                            form="stock_edit_form"
                                            :items="$types"
                                            name="f_type"
                                            labelValue="modules/stock.f_type"
                                            selectValue="modules/stock.type"
                                            :defaultValue="$stock->f_type"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_weightsign"
                                            labelValue="modules/stock.f_weightsign"
                                            :defaultValue="$stock->f_weightsign"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_product"
                                            labelValue="modules/stock.f_product"
                                            :defaultValue="$stock->f_product"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_scalesign"
                                            labelValue="modules/stock.f_scalesign"
                                            :defaultValue="$stock->f_scalesign"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$currencies"
                                            name="f_curid"
                                            labelValue="modules/stock.f_curid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-currency|f_curid"
                                            :defaultValue="$stock->f_curid"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$partners"
                                            name="f_partnerid"
                                            labelValue="modules/stock.f_partnerid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-partner|f_partnerid"
                                            :defaultValue="$stock->f_partnerid"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_code"
                                            labelValue="modules/stock.f_code"
                                            maxLength="100"
                                            :defaultValue="$stock->f_code"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$accounts"
                                            name="f_accountid"
                                            labelValue="modules/stock.f_accountid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-account|f_accountid"
                                            :defaultValue="$stock->f_accountid"
                                        />

                                        <x-form-elements.textarea
                                            form="stock_edit_form"
                                            name="f_ingredients"
                                            labelValue="modules/stock.f_ingredients"
                                            :defaultValue="$stock->f_ingredients"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_empty_pack"
                                            labelValue="modules/stock.f_empty_pack"
                                            :defaultValue="$stock->f_empty_pack"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_f1"
                                            labelValue="modules/stock.f_f1"
                                            maxLength="1000"
                                            :defaultValue="$stock->f_f1"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_f2"
                                            labelValue="modules/stock.f_f2"
                                            maxLength="1000"
                                            :defaultValue="$stock->f_f2"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_f3"
                                            labelValue="modules/stock.f_f3"
                                            maxLength="1000"
                                            :defaultValue="$stock->f_f3"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_f4"
                                            labelValue="modules/stock.f_f4"
                                            maxLength="1000"
                                            :defaultValue="$stock->f_f4"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_f5"
                                            labelValue="modules/stock.f_f5"
                                            maxLength="1000"
                                            :defaultValue="$stock->f_f5"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_height"
                                            labelValue="modules/stock.f_height"
                                            maxLength="15"
                                            :defaultValue="$stock->f_height"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_width"
                                            labelValue="modules/stock.f_width"
                                            maxLength="15"
                                            :defaultValue="$stock->f_width"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_length"
                                            labelValue="modules/stock.f_length"
                                            maxLength="15"
                                            :defaultValue="$stock->f_length"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$stocks"
                                            name="f_main_stockid"
                                            labelValue="modules/stock.f_main_stockid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-main-stock|f_main_stockid"
                                            :defaultValue="$stock->f_main_stockid"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$registers1"
                                            name="f_r1id"
                                            labelValue="modules/stock.f_r1id"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-register1|f_r1id"
                                            :defaultValue="$stock->f_r1id"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$registers2"
                                            name="f_r2id"
                                            labelValue="modules/stock.f_r2id"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-register2|f_r2id"
                                            :defaultValue="$stock->f_r2id"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$registers3"
                                            name="f_r3id"
                                            labelValue="modules/stock.f_r3id"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-register3|f_r3id"
                                            :defaultValue="$stock->f_f1"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$registers4"
                                            name="f_r4id"
                                            labelValue="modules/stock.f_r4id"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-register4|f_r4id"
                                            :defaultValue="$stock->f_r3id"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$registers5"
                                            name="f_r5id"
                                            labelValue="modules/stock.f_r5id"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-register5|f_r5id"
                                            :defaultValue="$stock->f_r5id"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$departments"
                                            name="f_departmentid"
                                            labelValue="modules/stock.f_departmentid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-department|f_departmentid"
                                            :defaultValue="$stock->f_departmentid"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$persons"
                                            name="f_personid"
                                            labelValue="modules/stock.f_personid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-person|f_personid"
                                            :defaultValue="$stock->f_personid"
                                        />

                                        <x-form-elements.select-with-button
                                            form="stock_edit_form"
                                            :items="$projects"
                                            name="f_projectid"
                                            labelValue="modules/stock.f_projectid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-project|f_projectid"
                                            :defaultValue="$stock->f_projectid"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_quantity"
                                            labelValue="modules/stock.f_quantity"
                                            maxLength="15"
                                            :defaultValue="$stock->f_quantity"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark1"
                                            labelValue="modules/stock.f_mark1"
                                            :defaultValue="$stock->f_mark1"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark2"
                                            labelValue="modules/stock.f_mark2"
                                            :defaultValue="$stock->f_mark2"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark3"
                                            labelValue="modules/stock.f_mark3"
                                            :defaultValue="$stock->f_mark3"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark4"
                                            labelValue="modules/stock.f_mark4"
                                            :defaultValue="$stock->f_mark4"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark5"
                                            labelValue="modules/stock.f_mark5"
                                            :defaultValue="$stock->f_mark5"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark6"
                                            labelValue="modules/stock.f_mark6"
                                            :defaultValue="$stock->f_mark6"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark7"
                                            labelValue="modules/stock.f_mark7"
                                            :defaultValue="$stock->f_mark7"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_mark8"
                                            labelValue="modules/stock.f_mark8"
                                            :defaultValue="$stock->f_mark8"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_catalog_item"
                                            labelValue="modules/stock.f_catalog_item"
                                            :defaultValue="$stock->f_catalog_item"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_disp_priority"
                                            labelValue="modules/stock.f_disp_priority"
                                            maxLength="15"
                                            :defaultValue="$stock->f_disp_priority"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_locked"
                                            labelValue="modules/stock.f_locked"
                                            :defaultValue="$stock->f_locked"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_sales_block"
                                            labelValue="modules/stock.f_sales_block"
                                            :defaultValue="$stock->f_sales_block"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_purch_block"
                                            labelValue="modules/stock.f_purch_block"
                                            :defaultValue="$stock->f_purch_block"
                                        />

                                        <h4 class="form-label mt-4">@lang('modules/stock.title1')</h4>

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_gpais_i"
                                            labelValue="modules/stock.f_gpais_i"
                                            :defaultValue="$stock->f_gpais_i"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_gpais_a"
                                            labelValue="modules/stock.f_gpais_a"
                                            :defaultValue="$stock->f_gpais_a"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_gpais_n"
                                            labelValue="modules/stock.f_gpais_n"
                                            :defaultValue="$stock->f_gpais_n"
                                        />

                                        <x-form-elements.select-array
                                            form="stock_edit_form"
                                            :items="$pacTypes"
                                            name="f_pack_type"
                                            labelValue="modules/stock.f_pack_type"
                                            selectValue="modules/stock.gpais_pac_type"
                                            :defaultValue="$stock->f_pack_type"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-7" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_diviation_percentage"
                                            labelValue="modules/stock.f_diviation_percentage"
                                            maxLength="15"
                                            :defaultValue="$stock->f_diviation_percentage"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_imgurl"
                                            labelValue="modules/stock.f_imgurl"
                                            maxLength="500"
                                            :defaultValue="$stock->f_imgurl"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_prevent_manual_entry"
                                            labelValue="modules/stock.f_prevent_manual_entry"
                                            :defaultValue="$stock->f_prevent_manual_entry"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.checkbox-boolean
                                            form="stock_edit_form"
                                            name="f_ignor_gross_weight"
                                            labelValue="modules/stock.f_ignor_gross_weight"
                                            :defaultValue="$stock->f_ignor_gross_weight"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_system1"
                                            labelValue="modules/stock.f_system1"
                                            maxLength="100"
                                            :defaultValue="$stock->f_system1"
                                            hidden="hidden"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_system2"
                                            labelValue="modules/stock.f_system2"
                                            maxLength="100"
                                            :defaultValue="$stock->f_system2"
                                            hidden="hidden"
                                        />

                                        <x-form-elements.input
                                            form="stock_edit_form"
                                            name="f_system3"
                                            labelValue="modules/stock.f_system3"
                                            maxLength="100"
                                            :defaultValue="$stock->f_system3"
                                            hidden="hidden"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="row">
                                    <div class="col-auto">
                                        <x-form-elements.button
                                            form="stock_edit_form"
                                            class="btn-primary"
                                            name="button-action"
                                            value="price-sale-create"
                                            fontawesomeIcon="fas fa-plus"
                                            text="global.btn_new"
                                        />
                                    </div>
                                </div>

                                {{--    Pard. kainos--}}
                                <div class="row">
                                    <div class="col-12">
                                        <x-modules.items-list
                                            form="stock_edit_form"
                                            name="price-sale"
                                            deleteFormRoute="prices.destroy"
                                            :items="$pricesSale"
                                            :parentRouteData="$stock"
                                            :langs="['modules/price.f_id', 'modules/price.f_storeid', 'modules/price.f_type', 'modules/price.f_price', 'modules/price.f_price_orig', 'modules/price.f_promotion', 'modules/price.f_valid_from', 'modules/price.f_valid_till']"
                                            :fields="['f_id', 'f_storeid', 'f_type', 'f_price', 'f_price_orig', 'f_promotion', 'f_valid_from', 'f_valid_till']"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-4" role="tabpanel">
                                <div class="row">
                                    <div class="col-auto">
                                        <x-form-elements.button
                                            form="stock_edit_form"
                                            class="btn-primary"
                                            name="button-action"
                                            value="price-purch-create"
                                            fontawesomeIcon="fas fa-plus"
                                            text="global.btn_new"
                                        />
                                    </div>
                                </div>

                                {{--    Pirk. kainos--}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="col-12">
                                            <x-modules.items-list
                                                form="stock_edit_form"
                                                name="price-purch"
                                                deleteFormRoute="prices.destroy"
                                                :items="$pricesPurch"
                                                :parentRouteData="$stock"
                                                :langs="['modules/price.f_id', 'modules/price.f_storeid', 'modules/price.f_type', 'modules/price.f_price', 'modules/price.f_price_orig', 'modules/price.f_promotion', 'modules/price.f_valid_from', 'modules/price.f_valid_till']"
                                                :fields="['f_id', 'f_storeid', 'f_type', 'f_price', 'f_price_orig', 'f_promotion', 'f_valid_from', 'f_valid_till']"
                                            />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-5" role="tabpanel">
                                <div class="row">
                                    <div class="col-auto">
                                        <x-form-elements.button
                                            form="stock_edit_form"
                                            class="btn-primary"
                                            name="button-action"
                                            value="joined-stock-create"
                                            fontawesomeIcon="fas fa-plus"
                                            text="global.btn_new"
                                        />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <x-modules.items-list
                                            form="stock_edit_form"
                                            name="joined-stock"
                                            deleteFormRoute="joined-stocks.destroy"
                                            :items="$joinedStocks"
                                            :parentRouteData="$stock"
                                            :langs="['modules/joinedStock.f_id', 'modules/joinedStock.f_stockid', 'modules/joinedStock.f_joined_stockid', 'modules/joinedStock.f_quant', 'modules/joinedStock.f_create_date']"
                                            :fields="['f_id', 'f_stockid', 'f_joined_stockid', 'f_quant', 'f_create_date']"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-6" role="tabpanel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="stock_edit_form"
            route="stocks.update"
            :data="$stock"
            method="PUT"
        />
    </div>
@endsection
