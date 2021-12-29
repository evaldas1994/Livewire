@extends('layouts.app')

@section('content')
    <a href="{{ route('periods.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/period.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/period.f_id')</th>
                            <th scope="col">@lang('modules/period.f_name')</th>
                            <th scope="col">@lang('modules/period.f_begin')</th>
                            <th scope="col">@lang('modules/period.f_end')</th>
                            <th scope="col">@lang('modules/period.f_closed')</th>
                            <th scope="col">@lang('modules/period.f_create_userid')</th>
                            <th scope="col">@lang('modules/period.f_create_date')</th>
                            <th scope="col">@lang('modules/period.f_modified_userid')</th>
                            <th scope="col">@lang('modules/period.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($periods as $period)
                            <tr>
                                <td>{{ $period->f_id }}</td>
                                <td>{{ $period->f_name }}</td>
                                <td>{{ $period->f_begin }}</td>
                                <td>{{ $period->f_end }}</td>
                                <td>{{ $period->f_closed }}</td>
                                <td>{{ $period->f_create_userid }}</td>
                                <td>{{ $period->f_create_date }}</td>
                                <td>{{ $period->f_modified_userid }}</td>
                                <td>{{ $period->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('periods.edit', $period ) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $period->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('periods.destroy', $period) }}" method="POST" class="d-none" id="delete-form-{{ $period->f_id }}">
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
            {{ $periods->links() }}
        </div>
    </div>
@endsection

