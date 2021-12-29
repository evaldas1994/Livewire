@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/assetGroup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="asset_group_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="asset_group_create_form"
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
                                    form="asset_group_create_form"
                                    name="f_id"
                                    labelValue="modules/assetGroup.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="asset_group_create_form"
                                    name="f_name"
                                    labelValue="modules/assetGroup.f_name"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="asset_group_create_form"
                                    name="f_name2"
                                    labelValue="modules/assetGroup.f_name2"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="asset_group_create_form"
                                    name="f_system1"
                                    labelValue="modules/assetGroup.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="asset_group_create_form"
                                    name="f_system2"
                                    labelValue="modules/assetGroup.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="asset_group_create_form"
                                    name="f_system3"
                                    labelValue="modules/assetGroup.f_system3"
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
                id="asset_group_create_form"
                route="asset-groups.store"
                method="POST"
            />
        </div>
@endsection
