@extends('layouts.app')

@section('content')
    <livewire:budget.edit
        :accounts="$accounts"
        :registers1="$registers1"
        :registers2="$registers2"
        :registers3="$registers3"
        :registers4="$registers4"
        :registers5="$registers5"
        :departments="$departments"
        :projects="$projects"
        :years="$years"
        :months="$months"
        :budget="$budget"
    />
@endsection
