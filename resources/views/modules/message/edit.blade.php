@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto">
                <h1>@lang('modules/message.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="message_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="message_edit_form"
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
                                    form="message_edit_form"
                                    name="f_id"
                                    labelValue="modules/message.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                    :defaultValue="$message->f_id"
                                />

                                <x-form-elements.input
                                    form="message_edit_form"
                                    name="f_name"
                                    labelValue="modules/message.f_name"
                                    maxLength="10"
                                    :defaultValue="$message->f_name"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="message_edit_form"
                                    :items="$messageGroups"
                                    name="f_groupid"
                                    labelValue="modules/message.f_groupid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-message-group|f_groupid"
                                    :defaultValue="$message->f_groupid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="message_edit_form"
                                    name="f_days"
                                    labelValue="modules/message.f_days"
                                    maxLength="15"
                                    :defaultValue="$message->f_days"
                                />

                                <x-form-elements.input
                                    form="message_edit_form"
                                    name="f_min_sum"
                                    labelValue="modules/message.f_min_sum"
                                    maxLength="15"
                                    :defaultValue="$message->f_min_sum"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="message_edit_form"
                                    name="f_subject"
                                    labelValue="modules/message.f_subject"
                                    maxLength="15"
                                    :defaultValue="$message->f_subject"
                                />

                                <x-form-elements.textarea
                                    form="message_edit_form"
                                    name="f_message"
                                    labelValue="modules/message.f_message"
                                    :defaultValue="$message->f_message"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="message_edit_form"
                                    name="f_system1"
                                    labelValue="modules/message.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$message->f_system1"
                                />

                                <x-form-elements.input
                                    form="message_edit_form"
                                    name="f_system2"
                                    labelValue="modules/message.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$message->f_system2"
                                />

                                <x-form-elements.input
                                    form="message_edit_form"
                                    name="f_system3"
                                    labelValue="modules/message.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$message->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="message_edit_form"
            route="messages.update"
            :data="$message"
            method="PUT"
        />
    </div>
@endsection
