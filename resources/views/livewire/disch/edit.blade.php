<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/disch.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="disch_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="disch_edit_form"
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
                                form="disch_edit_form"
                                name="f_id"
                                labelValue="modules/disch.f_id"
                                inputClass="not-empty"
                                maxLength="20"
                                wireModel="f_id"
                                wireChange="changeId($event.target.value)"
                                :defaultValue="$f_id"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="disch_edit_form"
                                name="f_name"
                                labelValue="modules/disch.f_name"
                                maxLength="100"
                                :defaultValue="$f_name"
                                wireModel="f_name"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                form="disch_edit_form"
                                name="f_system1"
                                labelValue="modules/disch.f_system1"
                                maxLength="100"
                                :defaultValue="$f_system1"
                                wireModel="f_system1"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="disch_edit_form"
                                name="f_system2"
                                labelValue="modules/disch.f_system2"
                                maxLength="100"
                                :defaultValue="$f_system2"
                                wireModel="f_system2"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                form="disch_edit_form"
                                name="f_system3"
                                labelValue="modules/disch.f_system3"
                                maxLength="100"
                                :defaultValue="$f_system3"
                                wireModel="f_system3"
                                hidden="hidden"
                            />
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>@lang('modules/discd.h1')</h4>
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
                                form="disch_edit_form"
                                :items="$allDiscd"
                                :parentRouteData="$disch"
                                :langs="['modules/discd.f_id', 'modules/discd.f_quant', 'modules/discd.f_perc']"
                                :fields="['f_id', 'f_quant', 'f_perc']"
                                deleteFormRoute="discd.destroy"
                                name="discd"
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
            <livewire:discd.create :disch="$disch"/>
        </div>
    @endif

    @if($showEdit && $discd != null)
        <div class="row">
            <livewire:discd.edit :disch="$disch" :discd="$discd"/>
        </div>
    @endif

    {{--    Forms--}}
    <x-form-elements.form
        id="disch_edit_form"
        route="disch.update"
        :data="$disch"
        method="PUT"
    />
</div>
