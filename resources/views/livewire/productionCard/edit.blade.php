<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/productionCard.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="production_card_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="production_card_edit_form"
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
                                            form="production_card_edit_form"
                                            name="f_id"
                                            labelValue="modules/productionCard.f_id"
                                            maxLength="20"
                                            wireModel="f_id"
                                            wireChange="changeId($event.target.value)"
                                            inputClass="not-empty"
                                            :defaultValue="$f_id"
                                        />

                                        <x-form-elements.select-with-button
                                            form="production_card_edit_form"
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
                                            form="production_card_edit_form"
                                            name="f_stock_name"
                                            labelValue="modules/productionCard.f_stock_name"
                                            maxLength="20"
                                            wireModel="f_stock_name"
                                            readonly="readonly"
                                            :defaultValue="$f_stock_name"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="production_card_edit_form"
                                            name="f_name"
                                            labelValue="modules/productionCard.f_name"
                                            maxLength="100"
                                            wireModel="f_name"
                                            :defaultValue="$f_name"
                                        />

                                        <x-form-elements.input
                                            form="production_card_edit_form"
                                            name="f_name2"
                                            labelValue="modules/productionCard.f_name2"
                                            maxLength="100"
                                            wireModel="f_name2"
                                            :defaultValue="$f_name2"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            form="production_card_edit_form"
                                            name="f_quant"
                                            labelValue="modules/productionCard.f_quant"
                                            maxLength="15"
                                            wireModel="f_quant"
                                            :defaultValue="$f_quant"
                                        />

                                        <x-form-elements.input
                                            form="production_card_edit_form"
                                            name="f_unitid"
                                            labelValue="modules/productionCard.f_unitid"
                                            maxLength="20"
                                            wireModel="f_unitid"
                                            readonly="readonly"
                                            :defaultValue="$f_unitid"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.textarea
                                            form="production_card_edit_form"
                                            name="f_description"
                                            labelValue="modules/productionCard.f_description"
                                            wireModel="f_description"
                                            :defaultValue="$f_description"
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
                            <button wire:click="showCreate"
                                    class="btn btn-primary"
                            ><i class="fas fa-plus"></i>
                                @lang('global.btn_new')
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <x-modules.items-list
                                form="production_card_edit_form"
                                :items="$productionCardComponents"
                                :parentRouteData="$productionCard"
                                :langs="['modules/productionCardComponent.f_id', 'modules/productionCardComponent.f_stockid', 'modules/productionCardComponent.f_quant', 'modules/productionCardComponent.f_price', 'modules/productionCardComponent.f_unitid']"
                                :fields="['f_id', 'f_stockid', 'f_quant', 'f_price', 'f_unitid']"
                                deleteFormRoute="production-card-components.destroy"
                                name="production-card-component"
                                wireEmmitUpName="showEdit"
                                wireEmmitValue="true"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($showCreate)
        <div class="row">
            <livewire:production-card-component.create
                :productionCard="$productionCard"
                :stocks="$stocks"
                :types="$types"/>
        </div>
    @endif

    @if($showEdit && $productionCardComponent != null)
        <div class="row">
            <livewire:production-card-component.edit
                :productionCard="$productionCard"
                :stocks="$stocks"
                :types="$types"
                :productionCardComponent="$productionCardComponent"/>
        </div>
    @endif

    {{--    Forms--}}
    <x-form-elements.form
        id="production_card_edit_form"
        route="production-cards.update"
        :data="$productionCard"
        enctype="multipart/form-data"
        method="PUT"
    />
</div>
