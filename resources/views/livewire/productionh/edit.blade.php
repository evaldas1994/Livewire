<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/productionh.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="productionh_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="productionh_edit_form"
                class="btn-dark"
                name="button-action-without-validation"
                value="close"
                text="global.btn_close"
            />
        </div>
    </div>
    <div class="row">
            <div class="card">
                <div class="card-body">
                    <form id="productionh_edit_form"
                          name="productionh_edit_form"
                          action="{{ route('productionsh.update', $productionsh) }}" method="POST">
                        @csrf
                        @method('PUT')

                    <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-date
                                    name="f_docdate"
                                    labelValue="modules/productionh.f_docdate"
                                    inputClass="not-empty"
                                    :defaultValue="$f_docdate"
                                    wireModel="f_docdate"
                                />

                                <x-form-elements.input
                                    name="f_blankno"
                                    labelValue="modules/productionh.f_blankno"
                                    maxLength="20"
                                    :defaultValue="$f_blankno"
                                    wireModel="f_blankno"
                                />

                                <x-form-elements.input
                                    name="f_description"
                                    labelValue="modules/productionh.f_description"
                                    maxLength="200"
                                    :defaultValue="$f_description"
                                    wireModel="f_description"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    form="productionh_edit_form"
                                    :items="$stores"
                                    name="f_storeid"
                                    labelValue="modules/productionh.f_storeid"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-store|f_storeid"
                                    wireModel="f_storeid"
                                    wireChange="changeStore($event.target.value)"
                                    defaultValue="f_storeid"
                                />

                                <x-form-elements.select-with-button
                                    :items="$productionGroups"
                                    name="f_groupid"
                                    labelValue="modules/productionh.f_groupid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-production-group|f_groupid"
                                    wireModel="f_groupid"
                                    wireChange="changeProductionGroup($event.target.value)"
                                    defaultValue="f_groupid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    :items="$templates"
                                    name="f_templateid1"
                                    labelValue="modules/productionh.f_templateid1"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-template-1|f_templateid1"
                                    wireModel="f_templateid1"
                                    wireChange="changeTemplate1($event.target.value)"
                                    defaultValue="f_templateid1"
                                />

                                <x-form-elements.select-with-button
                                    :items="$stockOperationGroups"
                                    name="f_groupid1"
                                    labelValue="modules/productionh.f_groupid1"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-stock-operation-group-1|f_groupid1"
                                    wireModel="f_groupid1"
                                    wireChange="changeStockOperationGroup1($event.target.value)"
                                    defaultValue="f_groupid1"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    :items="$templates"
                                    name="f_templateid2"
                                    labelValue="modules/productionh.f_templateid2"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-template-2|f_templateid2"
                                    wireModel="f_templateid2"
                                    wireChange="changeTemplate2($event.target.value)"
                                    defaultValue="f_templateid2"
                                />

                                <x-form-elements.select-with-button
                                    :items="$stockOperationGroups"
                                    name="f_groupid2"
                                    labelValue="modules/productionh.f_groupid2"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-stock-operation-group-2|f_groupid2"
                                    wireModel="f_groupid2"
                                    wireChange="changeStockOperationGroup2($event.target.value)"
                                    defaultValue="f_groupid2"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/productionh.f_system1"
                                    maxLength="100"
                                    :defaultValue="$f_system1"
                                    wireModel="f_system1"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/productionh.f_system2"
                                    maxLength="100"
                                    :defaultValue="$f_system2"
                                    wireModel="f_system2"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/productionh.f_system3"
                                    maxLength="100"
                                    :defaultValue="$f_system3"
                                    wireModel="f_system3"
                                    hidden="hidden"
                                />
                            </div>

                    </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <h4>@lang('modules/productiond.h1')</h4>
                        </div>

                        <div class="col-auto">
                            <button wire:click="showCreateProductiond"
                                    class="btn btn-primary"
                                    type="button"
                            ><i class="fas fa-plus"></i>
                                @lang('global.btn_new')
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <x-modules.items-list
                                form="productionh_edit_form"
                                :items="$allProductionsd"
                                :parentRouteData="$productionsh"
                                :langs="['modules/productiond.f_id', 'modules/productiond.f_bomid', 'modules/productiond.f_quant', 'modules/productiond.f_description']"
                                :fields="['f_id', 'f_bomid', 'f_quant', 'f_description']"
                                deleteFormRoute="productionsd.destroy"
                                name="productiond"
                                wireEmmitUpName="showEditProductiond"
                                wireEmmitValue="true"
                            />
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @if($showCreateProductiond)
        <div class="row">
            <livewire:productiond.create
                :productionsh="$productionsh"
                :productionsd="$productionsd"
                :productionCards="$productionCards"
                :stores="$stores"
                :registers1="$registers1"
                :registers2="$registers2"
                :registers3="$registers3"
                :registers4="$registers4"
                :registers5="$registers5"
            />
        </div>
    @endif

    @if($showEditProductiond && $productionsd != null)
        <div class="row">
            <livewire:productiond.edit
                :productionsd="$productionsd"
                :productionsh="$productionsh"
                :productionCards="$productionCards"
                :stores="$stores"
                :registers1="$registers1"
                :registers2="$registers2"
                :registers3="$registers3"
                :registers4="$registers4"
                :registers5="$registers5"
            />
        </div>
    @endif
</div>
