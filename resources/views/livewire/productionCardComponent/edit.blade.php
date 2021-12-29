<div class="fixed-bottom">
    <div class="row mb-2">
        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="production-card-component-edit-form"
                class="btn-primary"
                text="global.btn_save"
            />
            <button wire:click="$emitUp('showEdit', false)"
                    class="btn btn-primary"
            >
                @lang('global.btn_close')
            </button>
        </div>
    </div>
    <div class="row">
        <form id="production-card-component-edit-form"
              action="{{ route('production-card-components.update', [$productionCard, $productionCardComponent]) }}" method="POST"
              enctype=multipart/form-data laravel>
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-with-button
                                :items="$stocks"
                                name="f_stockid"
                                labelValue="modules/productionCardComponent.f_stockid"
                                selectClass="not-empty"
                                buttonName="button-action-without-validation"
                                buttonValue="select-stock|f_stockid"
                                wireModel="f_stockid"
                                wireChange="changeStock($event.target.value)"
                                defaultValue="f_stockid"
                            />

                            <x-form-elements.input
                                name="f_stock_name"
                                labelValue="modules/productionCardComponent.f_stock_name"
                                maxLength="20"
                                :defaultValue="$f_stock_name"
                                wireModel="f_stock_name"
                                readonly="readonly"
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
                            <x-form-elements.select-with-button
                                :items="$stocks"
                                name="f_alter_stockid"
                                labelValue="modules/productionCardComponent.f_alter_stockid"
                                buttonName="button-action-without-validation"
                                buttonValue="select-alter-stock|f_alter_stockid"
                                wireModel="f_alter_stockid"
                                wireChange="changeAlterStock($event.target.value)"
                                defaultValue="f_alter_stockid"
                            />

                            <x-form-elements.input
                                name="f_alter_stock_name"
                                labelValue="modules/productionCardComponent.f_alter_stock_name"
                                maxLength="20"
                                :defaultValue="$f_alter_stock_name"
                                wireModel="f_alter_stock_name"
                                readonly="readonly"
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

                            <x-form-elements.input
                                name="f_price"
                                labelValue="modules/productionCardComponent.f_price"
                                maxLength="15"
                                :defaultValue="$f_price"
                                wireModel="f_price"
                                readonly="{{ $f_price_locked == 1 ? 'readonly' : null }}"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-array
                                :items="$types"
                                name="f_type"
                                labelValue="modules/productionCardComponent.f_type"
                                selectValue="modules/productionCardComponent.type"
                                wireModel="f_type"
                                wireChange="changeType($event.target.value)"
                                defaultValue="f_type"
                                disabled="{{ $f_type_locked == 1 ? 'disabled' : null }}"
                            />

                            <x-form-elements.input
                                name="f_neto"
                                labelValue="modules/productionCardComponent.f_neto"
                                maxLength="15"
                                :defaultValue="$f_neto"
                                wireModel="f_neto"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
