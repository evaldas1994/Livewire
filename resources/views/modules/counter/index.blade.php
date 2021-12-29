@extends('layouts.app')

@section('content')
    <a href="{{ route('counters.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/counter.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/counter.f_id')</th>
                            <th scope="col">@lang('modules/counter.f_txt')</th>
                            <th scope="col">@lang('modules/counter.f_txt_len')</th>
                            <th scope="col">@lang('modules/counter.f_num')</th>
                            <th scope="col">@lang('modules/counter.f_num_len')</th>
                            <th scope="col">@lang('modules/counter.f_create_userid')</th>
                            <th scope="col">@lang('modules/counter.f_create_date')</th>
                            <th scope="col">@lang('modules/counter.f_modified_userid')</th>
                            <th scope="col">@lang('modules/counter.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($counters as $counter)
                            <tr>
                                <td>{{ $counter->f_id }}</td>
                                <td>{{ $counter->f_txt }}</td>
                                <td>{{ $counter->f_txt_len }}</td>
                                <td>{{ $counter->f_num }}</td>
                                <td>{{ $counter->f_num_len }}</td>
                                <td>{{ $counter->f_create_userid }}</td>
                                <td>{{ $counter->f_create_date }}</td>
                                <td>{{ $counter->f_modified_userid }}</td>
                                <td>{{ $counter->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('counters.edit', $counter ) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $counter->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('counters.destroy', $counter) }}" method="POST" class="d-none" id="delete-form-{{ $counter->f_id }}">
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
            {{ $counters->links() }}
        </div>
    </div>
@endsection

