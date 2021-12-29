<div class="fixed-bottom h-100 bg-black bg-opacity-75">
    <div class="fixed-bottom">
        <div class="row mb-2">
            <div class="col-auto ms-auto text-end mt-n1">
                <button
                    wire:click="store()"
                    type="button"
                    class="btn btn-primary"
                >
                    @lang('global.btn_save')
                </button>

                <button
                    wire:click="$emitUp('showPopupCreate', false)"
                    type="button"
                    class="btn btn-primary"
                >
                    @lang('global.btn_close')
                </button>
            </div>
        </div>
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <livewire:form.autocomplete
                                model="Stock"
                                inputName="f_stockid"
                                :params="[
                                    'default_value' => $f_stockid,
                                    'additional_params' => [
                                        'label' => ['value' => 'modules/productionCardComponent.f_stockid'],
                                        'autocomplete' => ['class' => 'not-empty', 'maxlength' => '20'],
                                        'name' => ['hidden' => false],
                                    ],
                                ]"
                            />

                            <x-form-elements.input
                                name="f_unitid"
                                labelValue="modules/productionCardComponent.f_unitid"
                                maxLength="20"
                                :defaultValue="$f_unitid"
                                wireModel="f_unitid"
                                readonly="readonly"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <livewire:form.autocomplete
                                model="Stock"
                                inputName="f_alter_stockid"
                                :params="[
                                    'default_value' => $f_alter_stockid,
                                    'additional_params' => [
                                        'label' => ['value' => 'modules/productionCardComponent.f_alter_stockid'],
                                        'autocomplete' => ['maxlength' => '20'],
                                        'name' => ['hidden' => false],
                                    ],
                                ]"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_quant"
                                labelValue="modules/productionCardComponent.f_quant"
                                maxLength="15"
                                :defaultValue="$f_quant"
                                wireModel="f_quant"
                            />

                            @if($f_type == '1')
                            <x-form-elements.input
                                name="f_price"
                                labelValue="modules/productionCardComponent.f_price"
                                maxLength="15"
                                :defaultValue="$f_price"
                                wireModel="f_price"
                                readonly="readonly"
                            />
                            @endif

                            @if($f_type == '2')
                                <x-form-elements.input
                                    name="f_price"
                                    labelValue="modules/productionCardComponent.f_price"
                                    maxLength="15"
                                    :defaultValue="$f_price"
                                    wireModel="f_price"
                                />
                            @endif
                        </div>

                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-array
                                :items="$types"
                                name="f_type"
                                labelValue="modules/productionCardComponent.f_type"
                                selectValue="modules/productionCardComponent.type"
                                wireModel="f_type"
                                disabled="disabled"
                                defaultValue="f_type"
                            />

                            <x-form-elements.input
                                name="f_neto"
                                labelValue="modules/productionCardComponent.f_neto"
                                maxLength="15"
                                :defaultValue="$f_neto"
                                wireModel="f_neto"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_system1"
                                labelValue="modules/productionCardComponent.f_system1"
                                maxLength="100"
                                :defaultValue="$f_system1"
                                wireModel="f_system1"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system2"
                                labelValue="modules/productionCardComponent.f_system2"
                                maxLength="100"
                                :defaultValue="$f_system2"
                                wireModel="f_system2"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system3"
                                labelValue="modules/productionCardComponent.f_system3"
                                maxLength="100"
                                :defaultValue="$f_system3"
                                wireModel="f_system3"
                                hidden="hidden"
                            />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
