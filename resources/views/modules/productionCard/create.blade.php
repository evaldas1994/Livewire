@extends('layouts.app')

@section('content')
    <livewire:production-card.create :stocks="$stocks"/>
@endsection
