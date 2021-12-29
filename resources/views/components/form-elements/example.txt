<x-form-elements.input-id
    name="f_id"
    labelValue="modules/productionCard.f_id"
    maxLength="40"
    inputClass="not-empty"
/>

<x-form-elements.input
    name="f_min_quant"
    labelValue="modules/productionCard.f_min_quant"
    maxLength="15"
    defaultValue="0.0000"
/>

<x-form-elements.input-date
    name="f_valid_date"
    labelValue="modules/productionCard.f_valid_date"
/>

<x-form-elements.select-array
    :items="$types"
    name="f_type"
    labelValue="modules/productionCard.f_type"
    selectValue="modules/productionCard.type"
/>

<x-form-elements.select-with-button
    :items="$stockGroups"
    name="f_groupid"
    labelValue="modules/productionCard.f_groupid"
    buttonName="button-action"
    buttonValue="select-stock-group"
/>

<x-form-elements.checkbox-boolean
    name="f_default"
    labelValue="modules/productionCard.f_default"
/>

<x-form-elements.textarea
    name="f_ingredients"
    labelValue="modules/productionCard.f_ingredients"
/>
