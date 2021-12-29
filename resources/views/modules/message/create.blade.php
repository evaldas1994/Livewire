@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto">
                <h1>@lang('modules/message.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="message_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="message_create_form"
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
                                    form="message_create_form"
                                    name="f_id"
                                    labelValue="modules/message.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                />

                                <x-form-elements.input
                                    form="message_create_form"
                                    name="f_name"
                                    labelValue="modules/message.f_name"
                                    maxLength="10"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="message_create_form"
                                    :items="$messageGroups"
                                    name="f_groupid"
                                    labelValue="modules/message.f_groupid"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-message-group|f_groupid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="message_create_form"
                                    name="f_days"
                                    labelValue="modules/message.f_days"
                                    maxLength="15"
                                    defaultValue="0"
                                />

                                <x-form-elements.input
                                    form="message_create_form"
                                    name="f_min_sum"
                                    labelValue="modules/message.f_min_sum"
                                    maxLength="15"
                                    defaultValue="0.00"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="message_create_form"
                                    name="f_subject"
                                    labelValue="modules/message.f_subject"
                                    maxLength="15"
                                />

                                <x-form-elements.textarea
                                    form="message_create_form"
                                    name="f_message"
                                    labelValue="modules/message.f_message"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="message_create_form"
                                    name="f_system1"
                                    labelValue="modules/message.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="message_create_form"
                                    name="f_system2"
                                    labelValue="modules/message.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="message_create_form"
                                    name="f_system3"
                                    labelValue="modules/message.f_system3"
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
            id="message_create_form"
            route="messages.store"
            method="POST"
        />
    </div>
@endsection
