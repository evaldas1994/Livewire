@extends('layouts.app')

@section('content')
    <a href="{{ route('departments.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/department.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/department.f_id')</th>
                            <th scope="col">@lang('modules/department.f_name')</th>
                            <th scope="col">@lang('modules/department.f_manager_id')</th>
                            <th scope="col">@lang('modules/department.f_parent_id')</th>
                            <th scope="col">@lang('modules/department.f_create_userid')</th>
                            <th scope="col">@lang('modules/department.f_create_date')</th>
                            <th scope="col">@lang('modules/department.f_modified_userid')</th>
                            <th scope="col">@lang('modules/department.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->f_id }}</td>
                                <td>{{ $department->f_name }}</td>
                                <td>{{ $department->f_manager_id }}</td>
                                <td>{{ $department->f_parent_id }}</td>
                                <td>{{ $department->f_create_userid }}</td>
                                <td>{{ $department->f_create_date }}</td>
                                <td>{{ $department->f_modified_userid }}</td>
                                <td>{{ $department->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('departments.edit', $department) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $department->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-none" id="delete-form-{{ $department->f_id }}">
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
            {{ $departments->links() }}
        </div>
    </div>
@endsection

