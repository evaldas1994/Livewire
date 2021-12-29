@extends('layouts.app')

@section('content')
    <livewire:productionh.create
        :stores="$stores"
        :templates="$templates"
        :productionGroups="$productionGroups"
        :stockOperationGroups="$stockOperationGroups"
        :todayDate="$todayDate"
    />
@endsection
