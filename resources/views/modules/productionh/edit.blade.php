@extends('layouts.app')

@section('content')
    <livewire:productionh.edit
        :productionsh="$productionsh"
        :stores="$stores"
        :templates="$templates"
        :productionGroups="$productionGroups"
        :stockOperationGroups="$stockOperationGroups"

        :productionCards="$productionCards"
        :registers1="$registers1"
        :registers2="$registers2"
        :registers3="$registers3"
        :registers4="$registers4"
        :registers5="$registers5"

        :allProductionsd="$allProductionsd"
    />
@endsection
