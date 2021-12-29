@extends('layouts.app')

@section('content')
    <a href="{{ route('calendars.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/calendar.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/calendar.f_id')</th>
                            <th scope="col">@lang('modules/calendar.f_year')</th>
                            <th scope="col">@lang('modules/calendar.f_month')</th>
                            <th scope="col">@lang('modules/calendar.f_create_userid')</th>
                            <th scope="col">@lang('modules/calendar.f_create_date')</th>
                            <th scope="col">@lang('modules/calendar.f_modified_userid')</th>
                            <th scope="col">@lang('modules/calendar.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($calendars as $calendar)
                            <tr>
                                <td>{{ $calendar->f_id }}</td>
                                <td>{{ $calendar->f_year }}</td>
                                <td>{{ $calendar->f_month }}</td>
                                <td>{{ $calendar->f_create_userid }}</td>
                                <td>{{ $calendar->f_create_date }}</td>
                                <td>{{ $calendar->f_modified_userid }}</td>
                                <td>{{ $calendar->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('calendars.edit', $calendar) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $calendar->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('calendars.destroy', $calendar) }}" method="POST" class="d-none" id="delete-form-{{ $calendar->f_id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $calendars->links() }}
        </div>
    </div>
@endsection

