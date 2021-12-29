
<div class="fixed-bottom">
    <div class="row mb-2">
        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="discount_store_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <button wire:click="$emitUp('showCreateStore', false)"
                    class="btn btn-primary"
            >
                @lang('global.btn_close')
            </button>
        </div>
    </div>
    <div class="row">
        <form id="discount_store_edit_form"
              action="{{ route('discount-stores.update', [$discountsh, $discountStore]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-with-button
                                :items="$stores"
                                name="f_storeid"
                                labelValue="modules/discountStore.f_storeid"
                                selectClass="not-empty"
                                buttonName="button-action-without-validation"
                                buttonValue="select-store|f_storeid"
                                wireModel="f_storeid"
                                wireChange="changeStore($event.target.value)"
                                defaultValue="f_storeid"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
