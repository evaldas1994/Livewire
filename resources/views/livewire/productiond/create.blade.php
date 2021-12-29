<div class="fixed-bottom">
    <div class="row mb-2">
        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="productiond_create_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <button wire:click="$emitUp('showCreateProductiond', false)"
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
                        <x-form-elements.select-with-button
                            form="productiond_create_form"
                            :items="$productionCards"
                            name="f_bomid"
                            labelValue="modules/productiond.f_bomid"
                            selectClass="not-empty"
                            buttonName="button-action-without-validation"
                            buttonValue="select-bom|f_bomid"
                            wireModel="f_bomid"
                            wireChange="changeBom($event.target.value)"
                            defaultValue="f_bomid"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_quant"
                            labelValue="modules/productiond.f_quant"
                            maxLength="15"
                            :defaultValue="$f_quant"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_description"
                            labelValue="modules/productiond.f_description"
                            maxLength="100"
                            :defaultValue="$f_description"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.select-with-button
                            form="productiond_create_form"
                            :items="$stores"
                            name="f_storeid"
                            labelValue="modules/productiond.f_storeid"
                            buttonName="button-action-without-validation"
                            buttonValue="select-store|f_storeid"
                            wireModel="f_storeid"
                            wireChange="changeStore($event.target.value)"
                            defaultValue="f_storeid"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_f1"
                            labelValue="modules/productiond.f_f1"
                            maxLength="100"
                            :defaultValue="$f_f1"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_f2"
                            labelValue="modules/productiond.f_f2"
                            maxLength="100"
                            :defaultValue="$f_f2"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_f3"
                            labelValue="modules/productiond.f_f3"
                            maxLength="100"
                            :defaultValue="$f_f3"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_f4"
                            labelValue="modules/productiond.f_f4"
                            maxLength="100"
                            :defaultValue="$f_f4"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_f5"
                            labelValue="modules/productiond.f_f5"
                            maxLength="100"
                            :defaultValue="$f_f5"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.select-with-button
                            form="productiond_create_form"
                            :items="$registers1"
                            name="f_r1id"
                            labelValue="modules/productiond.f_r1id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register-1|f_r1id"
                            wireModel="f_r1id"
                            wireChange="changeRegister1($event.target.value)"
                            defaultValue="f_r1id"
                        />

                        <x-form-elements.select-with-button
                            form="productiond_create_form"
                            :items="$registers2"
                            name="f_r2id"
                            labelValue="modules/productiond.f_r2id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register-2|f_r2id"
                            wireModel="f_r2id"
                            wireChange="changeRegister2($event.target.value)"
                            defaultValue="f_r2id"
                        />

                        <x-form-elements.select-with-button
                            form="productiond_create_form"
                            :items="$registers3"
                            name="f_r3id"
                            labelValue="modules/productiond.f_r3id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register-3|f_r3id"
                            wireModel="f_r3id"
                            wireChange="changeRegister3($event.target.value)"
                            defaultValue="f_r3id"
                        />

                        <x-form-elements.select-with-button
                            form="productiond_create_form"
                            :items="$registers4"
                            name="f_r4id"
                            labelValue="modules/productiond.f_r4id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register-4|f_r4id"
                            wireModel="f_r4id"
                            wireChange="changeRegister4($event.target.value)"
                            defaultValue="f_r4id"
                        />

                        <x-form-elements.select-with-button
                            form="productiond_create_form"
                            :items="$registers5"
                            name="f_r5id"
                            labelValue="modules/productiond.f_r5id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register-5|f_r5id"
                            wireModel="f_r5id"
                            wireChange="changeRegister5($event.target.value)"
                            defaultValue="f_r5id"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_system1"
                            labelValue="modules/productiond.f_system1"
                            maxLength="100"
                            :defaultValue="$f_system1"
                            hidden="hidden"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_system2"
                            labelValue="modules/productiond.f_system2"
                            maxLength="100"
                            :defaultValue="$f_system2"
                            hidden="hidden"
                        />

                        <x-form-elements.input
                            form="productiond_create_form"
                            name="f_system3"
                            labelValue="modules/productiond.f_system3"
                            maxLength="100"
                            :defaultValue="$f_system3"
                            hidden="hidden"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Forms--}}
    <x-form-elements.form
        id="productiond_create_form"
        route="productionsd.store"
        :data="$productionsh"
        method="POST"
    />
</div>
