@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/joinedStock.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="joined_stock_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="joined_stock_edit_form"
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
                            <x-form-elements.select-with-button
                                form="joined_stock_edit_form"
                                :items="$stocks"
                                name="f_joined_stockid"
                                labelValue="modules/joinedStock.f_joined_stockid"
                                selectClass="not-empty"
                                buttonName="button-action-without-validation"
                                buttonValue="select-joined-stock|f_joined_stockid"
                                :defaultValue="$joinedStock->f_joined_stockid"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="joined_stock_edit_form"
                                name="f_quant"
                                labelValue="modules/joinedStock.f_quant"
                                maxLength="15"
                                :defaultValue="$joinedStock->f_quant"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="joined_stock_edit_form"
                                name="f_system1"
                                labelValue="modules/joinedStock.f_system1"
                                maxLength="100"
                                :defaultValue="$joinedStock->f_system1"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="joined_stock_edit_form"
                                name="f_system2"
                                labelValue="modules/joinedStock.f_system2"
                                maxLength="100"
                                :defaultValue="$joinedStock->f_system2"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="joined_stock_edit_form"
                                name="f_system3"
                                labelValue="modules/joinedStock.f_system3"
                                maxLength="100"
                                :defaultValue="$joinedStock->f_system3"
                                hidden="hidden"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="joined_stock_edit_form"
            route="joined-stocks.update"
            :data="[$stock, $joinedStock]"
            method="PUT"
        />
    </div>
@endsection
