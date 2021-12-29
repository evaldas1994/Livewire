<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/budget.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="budget_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="budget_edit_form"
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
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.input-id
                            form="budget_edit_form"
                            name="f_id"
                            labelValue="modules/budget.f_id"
                            inputClass="not-empty"
                            wireModel="f_id"
                            :defaultValue="$f_id"
                            readonly="readonly"
                        />

                        <x-form-elements.select-array
                            form="budget_edit_form"
                            :items="$years"
                            name="f_year"
                            labelValue="modules/budget.f_year"
                            selectValue="modules/budget.year"
                            wireModel="f_year"
                            wireChange="setId"
                            defaultValue="f_year"
                        />

                        <x-form-elements.select-array
                            form="budget_edit_form"
                            :items="$months"
                            name="f_month"
                            labelValue="modules/budget.f_month"
                            selectValue="modules/budget.month"
                            wireModel="f_month"
                            wireChange="setId"
                            defaultValue="f_month"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.input
                            form="budget_edit_form"
                            name="f_credit_sum"
                            labelValue="modules/budget.f_credit_sum"
                            inputClass="not-empty"
                            maxLength="15"
                            :defaultValue="$f_credit_sum"
                            wireModel="f_credit_sum"
                        />

                        <x-form-elements.input
                            form="budget_edit_form"
                            name="f_debit_sum"
                            labelValue="modules/budget.f_debit_sum"
                            inputClass="not-empty"
                            maxLength="15"
                            :defaultValue="$f_debit_sum"
                            wireModel="f_debit_sum"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$accounts"
                            name="f_accountid"
                            labelValue="modules/budget.f_accountid"
                            selectClass="not-empty"
                            buttonName="button-action-without-validation"
                            buttonValue="select-account|f_accountid"
                            wireModel="f_accountid"
                            wireChange="setId"
                            defaultValue="f_accountid"
                        />

                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$departments"
                            name="f_departmentid"
                            labelValue="modules/budget.f_departmentid"
                            buttonName="button-action-without-validation"
                            buttonValue="select-department|f_departmentid"
                            wireModel="f_departmentid"
                            defaultValue="f_departmentid"
                        />

                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$projects"
                            name="f_projectid"
                            labelValue="modules/budget.f_projectid"
                            buttonName="button-action-without-validation"
                            buttonValue="select-project|f_projectid"
                            wireModel="f_projectid"
                            defaultValue="f_projectid"
                        />

                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$registers1"
                            name="f_r1id"
                            labelValue="modules/budget.f_r1id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register1|f_r1id"
                            wireModel="f_r1id"
                            defaultValue="f_r1id"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$registers2"
                            name="f_r2id"
                            labelValue="modules/budget.f_r2id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register2|f_r2id"
                            wireModel="f_r2id"
                            defaultValue="f_r2id"
                        />

                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$registers3"
                            name="f_r3id"
                            labelValue="modules/budget.f_r3id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register3|f_r3id"
                            wireModel="f_r3id"
                            defaultValue="f_r3id"
                        />

                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$registers4"
                            name="f_r4id"
                            labelValue="modules/budget.f_r4id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register4|f_r4id"
                            wireModel="f_r4id"
                            defaultValue="f_r4id"
                        />

                        <x-form-elements.select-with-button
                            form="budget_edit_form"
                            :items="$registers5"
                            name="f_r5id"
                            labelValue="modules/budget.f_r5id"
                            buttonName="button-action-without-validation"
                            buttonValue="select-register5|f_r5id"
                            wireModel="f_r5id"
                            defaultValue="f_r5id"
                        />
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <x-form-elements.input
                            form="budget_edit_form"
                            name="f_system1"
                            labelValue="modules/budget.f_system1"
                            maxLength="100"
                            :defaultValue="$f_system1"
                            wireModel="f_system1"
                            hidden="hidden"
                        />

                        <x-form-elements.input
                            form="budget_edit_form"
                            name="f_system2"
                            labelValue="modules/budget.f_system2"
                            maxLength="100"
                            :defaultValue="$f_system2"
                            wireModel="f_system2"
                            hidden="hidden"
                        />

                        <x-form-elements.input
                            form="budget_edit_form"
                            name="f_system3"
                            labelValue="modules/budget.f_system3"
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

    {{--    Forms--}}
    <x-form-elements.form
        id="budget_edit_form"
        route="budgets.update"
        :data="$budget"
        method="PUT"
    />
</div>
