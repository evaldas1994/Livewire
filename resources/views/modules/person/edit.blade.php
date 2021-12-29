@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/person.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="person_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="person_edit_form"
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
                                    form="person_edit_form"
                                    name="f_id"
                                    labelValue="modules/person.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                    :defaultValue="$person->f_id"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="person_edit_form"
                                    name="f_name"
                                    labelValue="modules/person.f_name"
                                    maxLength="100"
                                    :defaultValue="$person->f_name"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="person_edit_form"
                                    name="f_name2"
                                    labelValue="modules/person.f_name2"
                                    maxLength="100"
                                    :defaultValue="$person->f_name2"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="person_edit_form"
                                    name="f_coef"
                                    labelValue="modules/person.f_coef"
                                    maxLength="15"
                                    :defaultValue="$person->f_coef"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="person_edit_form"
                                    name="f_system1"
                                    labelValue="modules/person.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$person->f_system1"
                                />

                                <x-form-elements.input
                                    form="person_edit_form"
                                    name="f_system2"
                                    labelValue="modules/person.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$person->f_system2"
                                />

                                <x-form-elements.input
                                    form="person_edit_form"
                                    name="f_system3"
                                    labelValue="modules/person.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$person->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="person_edit_form"
            route="persons.update"
            :data="$person"
            method="PUT"
        />
    </div>
@endsection
