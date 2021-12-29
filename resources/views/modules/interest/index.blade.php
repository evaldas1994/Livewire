@extends('layouts.app')

@section('content')
    <a href="{{ route('interests.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/interest.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/interest.f_id')</th>
                            <th scope="col">@lang('modules/interest.f_interest')</th>
                            <th scope="col">@lang('modules/interest.f_create_userid')</th>
                            <th scope="col">@lang('modules/interest.f_create_date')</th>
                            <th scope="col">@lang('modules/interest.f_modified_userid')</th>
                            <th scope="col">@lang('modules/interest.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($interests as $interest)
                            <tr>
                                <td>{{ $interest->f_id }}</td>
                                <td>{{ $interest->f_interest }}</td>
                                <td>{{ $interest->f_create_userid }}</td>
                                <td>{{ $interest->f_create_date }}</td>
                                <td>{{ $interest->f_modified_userid }}</td>
                                <td>{{ $interest->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('interests.edit', $interest) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $interest->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('interests.destroy', $interest) }}" method="POST" class="d-none" id="delete-form-{{ $interest->f_id }}">
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
            {{ $interests->links() }}
        </div>
    </div>
@endsection

