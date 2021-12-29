<x-form-elements.input-id
    name="f_id"
    labelValue="modules/stock.f_id"
    maxLength="40"
    inputClass="not-empty"
/>

<x-form-elements.input
    name="f_min_quant"
    labelValue="modules/stock.f_min_quant"
    maxLength="15"
    defaultValue="0.0000"
/>

<x-form-elements.input-date
    name="f_valid_date"
    labelValue="modules/stock.f_valid_date"
/>

<x-form-elements.select-array
    :items="$types"
    name="f_type"
    labelValue="modules/stock.f_type"
    selectValue="modules/stock.type"
/>

<x-form-elements.select-with-button
    :items="$stockGroups"
    name="f_groupid"
    labelValue="modules/stock.f_groupid"
    buttonName="button-action"
    buttonValue="select-stock-group"
/>

<x-form-elements.checkbox-boolean
    name="f_default"
    labelValue="modules/stock.f_default"
/>

<x-form-elements.textarea
    name="f_ingredients"
    labelValue="modules/stock.f_ingredients"
/>
