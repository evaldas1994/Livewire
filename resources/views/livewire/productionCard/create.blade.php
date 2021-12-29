<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/productionCard.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="production_card_create_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="production_card_create_form"
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
                            lang="modules/productionCard.tab"
                            count="2"
                        />
                    </div>

                    <div class="row">
                        <div class="tab tab-content mt-2">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input-id
                                            form="production_card_create_form"
                                            name="f_id"
                                            labelValue="modules/productionCard.f_id"
                                            inputClass="not-empty"
                                            maxLength="20"
                                            wireModel="f_id"
                                            wireChange="changeId($event.target.value)"
                                            :defaultValue="$f_id"
                                        />

                                        <x-form-elements.select-with-button
                                            form="production_card_create_form"
                                            :items="$stocks"
                                            name="f_stockid"
                                            labelValue="modules/productionCard.f_stockid"
                                            selectClass="not-empty"
                                            buttonName="button-action-without-validation"
                                            buttonValue="select-stock|f_stockid"
                                            wireModel="f_stockid"
                                            wireChange="changeStock($event.target.value)"
                                            defaultValue="f_stockid"
                                        />


                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_stock_name"
                                            labelValue="modules/productionCard.f_stock_name"
                                            maxLength="20"
                                            :defaultValue="$f_stock_name"
                                            wireModel="f_stock_name"
                                            readonly="readonly"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_name"
                                            labelValue="modules/productionCard.f_name"
                                            maxLength="100"
                                            :defaultValue="$f_name"
                                            wireModel="f_name"
                                        />

                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_name2"
                                            labelValue="modules/productionCard.f_name2"
                                            maxLength="100"
                                            :defaultValue="$f_name2"
                                            wireModel="f_name2"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_quant"
                                            labelValue="modules/productionCard.f_quant"
                                            maxLength="15"
                                            :defaultValue="$f_quant"
                                            wireModel="f_quant"
                                        />

                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_unitid"
                                            labelValue="modules/productionCard.f_unitid"
                                            maxLength="20"
                                            :defaultValue="$f_unitid"
                                            wireModel="f_unitid"
                                            readonly="readonly"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.textarea
                                            form="production_card_create_form"
                                            name="f_description"
                                            labelValue="modules/productionCard.f_description"
                                            wireModel="f_description"
                                            :defaultValue="$f_description"
                                        />
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_system1"
                                            labelValue="modules/productionCard.f_system1"
                                            maxLength="100"
                                            :defaultValue="$f_system1"
                                            hidden="hidden"
                                        />

                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_system2"
                                            labelValue="modules/productionCard.f_system2"
                                            maxLength="100"
                                            :defaultValue="$f_system2"
                                            hidden="hidden"
                                        />

                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_system3"
                                            labelValue="modules/productionCard.f_system3"
                                            maxLength="100"
                                            :defaultValue="$f_system3"
                                            hidden="hidden"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="mb-2">
                                            <label class="form-label"
                                                   for="f_image1">@lang('modules/productionCard.f_image1')</label>
                                            <input type="file"
                                                   id="f_image1"
                                                   class="form-control form-control-sm @error('f_image1') is-invalid @enderror"
                                                   name="f_image1"
                                                   value="{{ old('f_image1')}}">
                                            @error('f_image1') <span class="invalid-feedback"
                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="mb-2">
                                            <label class="form-label"
                                                   for="f_image2">@lang('modules/productionCard.f_image2')</label>
                                            <input type="file"
                                                   id="f_image2"
                                                   class="form-control form-control-sm @error('f_image2') is-invalid @enderror"
                                                   name="f_image2"
                                                   value="{{ old('f_image2')}}">
                                            @error('f_image2') <span class="invalid-feedback"
                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="mb-2">
                                            <label class="form-label"
                                                   for="f_image3">@lang('modules/productionCard.f_image3')</label>
                                            <input type="file"
                                                   id="f_image3"
                                                   class="form-control form-control-sm @error('f_image3') is-invalid @enderror"
                                                   name="f_image3"
                                                   value="{{ old('f_image3')}}">
                                            @error('f_image3') <span class="invalid-feedback"
                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="mb-2">
                                            <label class="form-label"
                                                   for="f_image4">@lang('modules/productionCard.f_image4')</label>
                                            <input type="file"
                                                   id="f_image4"
                                                   class="form-control form-control-sm @error('f_image4') is-invalid @enderror"
                                                   name="f_image4"
                                                   value="{{ old('f_image4')}}">
                                            @error('f_image4') <span class="invalid-feedback"
                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h4>@lang('modules/productionCardComponent.h1')</h4>
                        </div>

                        <div class="col-auto">
                            <x-form-elements.button
                                form="production_card_create_form"
                                class="btn-primary"
                                name="button-action"
                                value="production-card-component-create"
                                fontawesomeIcon="fas fa-plus"
                                text="global.btn_new"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Forms--}}
    <x-form-elements.form
        id="production_card_create_form"
        route="production-cards.store"
        enctype="multipart/form-data"
        method="POST"
    />
</div>
