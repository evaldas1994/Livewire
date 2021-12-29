@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($bonuses as $bonus)
            <p><a href="{{ route('bonuses.show', $bonus->f_id) }}">{{ $bonus->f_id }} </a></p>
        @endforeach
    </div>
@endsection
