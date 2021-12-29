@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/template.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="template_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="template_edit_form"
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
                            lang="modules/template.tab"
                            count="2"
                        />
                    </div>


                    <div class="row">
                        <div class="tab tab-content mt-2">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input-id
                                            form="template_edit_form"
                                            name="f_id"
                                            labelValue="modules/template.f_id"
                                            maxLength="20"
                                            inputClass="not-empty"
                                            :defaultValue="$template->f_id"
                                        />

                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_name"
                                            labelValue="modules/template.f_name"
                                            maxLength="100"
                                            :defaultValue="$template->f_name"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$stockOperationGroups"
                                            name="f_groupid"
                                            labelValue="modules/template.f_groupid"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-stock-operation-group|f_groupid"
                                            :defaultValue="$template->f_groupid"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.select-array
                                            form="template_edit_form"
                                            :items="$operationTypes"
                                            name="f_op"
                                            labelValue="modules/template.f_op"
                                            selectValue="modules/template.operation_type"
                                            :defaultValue="$template->f_op"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.checkbox-boolean
                                            form="template_edit_form"
                                            name="f_primary_document"
                                            labelValue="modules/template.f_primary_document"
                                            :defaultValue="$template->f_primary_document"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            form="template_edit_form"
                                            name="f_consignment"
                                            labelValue="modules/template.f_consignment"
                                            :defaultValue="$template->f_consignment"
                                        />
                                    </div>
                                </div>
                                <div class="row mt-2 mb-0 fw-bold">
                                    <div class="col-3">

                                    </div>

                                    <div class="col-3">
                                        @lang('modules/template.description')
                                    </div>

                                    <div class="col-3">
                                        @lang('modules/template.debit')
                                    </div>

                                    <div class="col-3">
                                        @lang('modules/template.credit')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title1')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description1"
                                            maxLength="100"
                                            :defaultValue="$template->f_description1"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account1"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-1|f_deb_account1"
                                            :defaultValue="$template->f_deb_account1"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account1"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-1|f_cred_account1"
                                            :defaultValue="$template->f_cred_account1"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title2')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description2"
                                            maxLength="100"
                                            :defaultValue="$template->f_description2"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account2"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-2|f_deb_account2"
                                            :defaultValue="$template->f_deb_account2"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account2"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-2|f_cred_account2"
                                            :defaultValue="$template->f_cred_account2"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title3')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description3"
                                            maxLength="100"
                                            :defaultValue="$template->f_description3"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account3"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-3|f_deb_account3"
                                            :defaultValue="$template->f_deb_account3"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account3"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-3|f_cred_account3"
                                            :defaultValue="$template->f_cred_account3"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title16')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description16"
                                            maxLength="100"
                                            :defaultValue="$template->f_description16"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account16"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-16|f_deb_account16"
                                            :defaultValue="$template->f_deb_account16"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account16"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-16|f_cred_account16"
                                            :defaultValue="$template->f_cred_account16"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title4')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description4"
                                            maxLength="100"
                                            :defaultValue="$template->f_description4"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account4"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-4|f_deb_account4"
                                            :defaultValue="$template->f_deb_account4"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account4"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-4|f_cred_account4"
                                            :defaultValue="$template->f_cred_account4"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title5')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description5"
                                            maxLength="100"
                                            :defaultValue="$template->f_description5"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account5"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-5|f_deb_account5"
                                            :defaultValue="$template->f_deb_account5"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account5"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-5|f_cred_account5"
                                            :defaultValue="$template->f_cred_account5"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title6')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description6"
                                            maxLength="100"
                                            :defaultValue="$template->f_description6"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account6"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-6|f_deb_account6"
                                            :defaultValue="$template->f_deb_account6"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account6"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-6|f_cred_account6"
                                            :defaultValue="$template->f_cred_account6"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title7')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description7"
                                            maxLength="100"
                                            :defaultValue="$template->f_description7"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account7"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-7|f_deb_account7"
                                            :defaultValue="$template->f_deb_account7"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account7"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-7|f_cred_account7"
                                            :defaultValue="$template->f_cred_account7"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title8')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description8"
                                            maxLength="100"
                                            :defaultValue="$template->f_description8"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account8"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-8|f_deb_account8"
                                            :defaultValue="$template->f_deb_account8"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account8"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-8|f_cred_account8"
                                            :defaultValue="$template->f_cred_account8"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title9')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description9"
                                            maxLength="100"
                                            :defaultValue="$template->f_description9"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account9"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-9|f_deb_account9"
                                            :defaultValue="$template->f_deb_account9"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account9"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-9|f_cred_account9"
                                            :defaultValue="$template->f_cred_account9"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title10')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description10"
                                            maxLength="100"
                                            :defaultValue="$template->f_description10"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account10"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-10|f_deb_account10"
                                            :defaultValue="$template->f_deb_account10"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account10"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-10|f_cred_account10"
                                            :defaultValue="$template->f_cred_account10"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title11')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description11"
                                            maxLength="100"
                                            :defaultValue="$template->f_description11"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account11"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-11|f_deb_account11"
                                            :defaultValue="$template->f_deb_account11"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account11"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-11|f_cred_account11"
                                            :defaultValue="$template->f_cred_account11"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title12')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description12"
                                            maxLength="100"
                                            :defaultValue="$template->f_description12"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account12"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-12|f_deb_account12"
                                            :defaultValue="$template->f_deb_account12"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account12"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-12|f_cred_account12"
                                            :defaultValue="$template->f_cred_account12"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title13')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description13"
                                            maxLength="100"
                                            :defaultValue="$template->f_description13"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account13"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-13|f_deb_account13"
                                            :defaultValue="$template->f_deb_account13"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account13"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-13|f_cred_account13"
                                            :defaultValue="$template->f_cred_account13"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title14')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description14"
                                            maxLength="100"
                                            :defaultValue="$template->f_description14"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account14"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-14|f_deb_account14"
                                            :defaultValue="$template->f_deb_account14"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account14"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-14|f_cred_account14"
                                            :defaultValue="$template->f_cred_account14"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title15')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description15"
                                            maxLength="100"
                                            :defaultValue="$template->f_description15"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account15"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-15|f_deb_account15"
                                            :defaultValue="$template->f_deb_account15"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account15"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-15|f_cred_account15"
                                            :defaultValue="$template->f_cred_account15"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title17')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description17"
                                            maxLength="100"
                                            :defaultValue="$template->f_description17"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account17"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-17|f_deb_account17"
                                            :defaultValue="$template->f_deb_account17"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account17"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-17|f_cred_account17"
                                            :defaultValue="$template->f_cred_account17"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title18')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description18"
                                            maxLength="100"
                                            :defaultValue="$template->f_description18"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account18"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-18|f_deb_account18"
                                            :defaultValue="$template->f_deb_account18"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account18"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-18|f_cred_account18"
                                            :defaultValue="$template->f_cred_account18"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title19')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description19"
                                            maxLength="100"
                                            :defaultValue="$template->f_description19"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account19"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-19|f_deb_account19"
                                            :defaultValue="$template->f_deb_account19"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account19"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-19|f_cred_account19"
                                            :defaultValue="$template->f_cred_account19"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title20')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description20"
                                            maxLength="100"
                                            :defaultValue="$template->f_description20"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account20"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-20|f_deb_account20"
                                            :defaultValue="$template->f_deb_account20"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account20"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-20|f_cred_account20"
                                            :defaultValue="$template->f_cred_account20"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title21')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description21"
                                            maxLength="100"
                                            :defaultValue="$template->f_description21"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account21"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-21|f_deb_account21"
                                            :defaultValue="$template->f_deb_account21"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account21"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-21|f_cred_account21"
                                            :defaultValue="$template->f_cred_account21"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title22')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description22"
                                            maxLength="100"
                                            :defaultValue="$template->f_description22"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account22"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-22|f_deb_account22"
                                            :defaultValue="$template->f_deb_account22"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account22"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-22|f_cred_account22"
                                            :defaultValue="$template->f_cred_account22"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        @lang('modules/template.title23')
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.input
                                            form="template_edit_form"
                                            name="f_description23"
                                            maxLength="100"
                                            :defaultValue="$template->f_description23"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_deb_account23"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-debit-account-23|f_deb_account23"
                                            :defaultValue="$template->f_deb_account23"
                                        />
                                    </div>

                                    <div class="col-3">
                                        <x-form-elements.select-with-button
                                            form="template_edit_form"
                                            :items="$accounts"
                                            name="f_cred_account23"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-credit-account-23|f_cred_account23"
                                            :defaultValue="$template->f_cred_account23"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-auto">
                                        <x-form-elements.button
                                            form="template_edit_form"
                                            class="btn-primary"
                                            name="button-action"
                                            value="template-reason-create"
                                            fontawesomeIcon="fas fa-plus"
                                            text="global.btn_new"
                                        />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <x-modules.items-list
                                            form="template_edit_form"
                                            name="template-reason"
                                            deleteFormRoute="template-reasons.destroy"
                                            :items="$templateReasons"
                                            :parentRouteData="$template"
                                            :langs="['modules/templateReason.f_id', 'modules/templateReason.f_description', 'modules/templateReason.f_templateid']"
                                            :fields="['f_id', 'f_description', 'f_templateid']"
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
            id="template_edit_form"
            route="templates.update"
            :data="$template"
            method="PUT"
        />
    </div>
@endsection
