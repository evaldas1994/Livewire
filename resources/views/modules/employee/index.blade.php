@extends('layouts.app')

@section('content')
    <a href="{{ route('employees.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/employee.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/employee.f_id')</th>
                            <th scope="col">@lang('modules/employee.f_name')</th>
                            <th scope="col">@lang('modules/employee.f_last_name')</th>
                            <th scope="col">@lang('modules/employee.f_sex')</th>
                            <th scope="col">@lang('modules/employee.f_personal_code')</th>
                            <th scope="col">@lang('modules/employee.f_social_insurance_id')</th>
                            <th scope="col">@lang('modules/employee.f_create_userid')</th>
                            <th scope="col">@lang('modules/employee.f_create_date')</th>
                            <th scope="col">@lang('modules/employee.f_modified_userid')</th>
                            <th scope="col">@lang('modules/employee.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employeee)
                            <tr>
                                <td>{{ $employeee->f_id }}</td>
                                <td>{{ $employeee->f_name }}</td>
                                <td>{{ $employeee->f_last_name }}</td>
                                <td>{{ $employeee->f_sex }}</td>
                                <td>{{ $employeee->f_personal_code }}</td>
                                <td>{{ $employeee->f_social_insurance_id }}</td>
                                <td>{{ $employeee->f_create_userid }}</td>
                                <td>{{ $employeee->f_create_date }}</td>
                                <td>{{ $employeee->f_modified_userid }}</td>
                                <td>{{ $employeee->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('employees.edit', $employeee) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $employeee->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('employees.destroy', $employeee) }}" method="POST" class="d-none" id="delete-form-{{ $employeee->f_id }}">
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
            {{ $employees->links() }}
        </div>
    </div>
@endsection

