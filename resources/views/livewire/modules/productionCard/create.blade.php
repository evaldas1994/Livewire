<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/productionCard.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end">
            <button
                wire:click="store()"
                type="button"
                class="btn btn-primary"
            >
                @lang('global.btn_save')
            </button>

            <button
                wire:click="close('setPage', 'index')"
                type="button"
                class="btn btn-dark"
            >
                @lang('global.btn_close')
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <ul class="nav nav-tabs" role="tablist">
                            <x-modules.tab
                                :tab="$tab"
                                count="2"
                                lang="modules/productionCard.tab"
                            />
                        </ul>
                    </div>

                    <div class="row">
                        <div class="tab tab-content mt-2">
                            <div class="tab-pane {{ $tab == 1 ?  'show active' : '' }}" id="tab-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input-id
                                            form="production_card_create_form"
                                            name="f_id"
                                            labelValue="modules/productionCard.f_id"
                                            inputClass="not-empty"
                                            maxLength="20"
                                            wireModelLazy="f_id"
                                            defaultValue="f_id"
                                        />

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
                                        <livewire:form.autocomplete
                                            model="Stock"
                                            inputName="f_stockid"
                                            :params="[
                                                'default_value' => $f_stockid,
                                                'additional_params' => [
                                                    'label' => ['value' => 'modules/productionCard.f_stockid'],
                                                    'autocomplete' => ['class' => 'not-empty', 'maxlength' => '20'],
                                                    'name' => ['hidden' => false],
                                                ],
                                            ]"
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

                                        <x-form-elements.input
                                            form="production_card_create_form"
                                            name="f_quant"
                                            labelValue="modules/productionCard.f_quant"
                                            maxLength="15"
                                            :defaultValue="$f_quant"
                                            wireModel="f_quant"
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
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>@lang('modules/productionCardComponent.h1')</h4>
                                    </div>

                                    <div class="col-auto">
                                        <button
                                            wire:click="storeAndRedirect()"
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            @lang('global.btn_new')
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane {{ $tab == 2 ?  'show active' : '' }}" id="tab-2" role="tabpanel">
                                <div class="row">
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <div class="mb-2">
                                                <label
                                                    class="form-label"
                                                    for="f_image1">@lang('modules/productionCard.f_image1')</label>
                                                <input
                                                    wire:model="f_image1"
                                                    type="file"
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
                                                <input wire:model="f_image2"
                                                       type="file"
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
                                                <input wire:model="f_image3"
                                                       type="file"
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
                                                <input wire:model="f_image4"
                                                       type="file"
                                                       id="f_image4"
                                                       class="form-control form-control-sm @error('f_image4') is-invalid @enderror"
                                                       name="f_image4"
                                                       value="{{ old('f_image4')}}">
                                                @error('f_image4') <span class="invalid-feedback"
                                                                         role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
{{--                                        <img src="{{ asset('storage/modules/productionCard/f_image1.jpg') }}" alt="image">--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
