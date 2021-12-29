@extends('layouts.app')

@section('content')
    <a href="{{ route('account-groups.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/accountGroup.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/accountGroup.f_id')</th>
                            <th scope="col">@lang('modules/accountGroup.f_name')</th>
                            <th scope="col">@lang('modules/accountGroup.f_name2')</th>
                            <th scope="col">@lang('modules/accountGroup.f_create_userid')</th>
                            <th scope="col">@lang('modules/accountGroup.f_create_date')</th>
                            <th scope="col">@lang('modules/accountGroup.f_modified_userid')</th>
                            <th scope="col">@lang('modules/accountGroup.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accountGroups as $accountGroup)
                            <tr>
                                <td>{{ $accountGroup->f_id }}</td>
                                <td>{{ $accountGroup->f_name }}</td>
                                <td>{{ $accountGroup->f_name2 }}</td>
                                <td>{{ $accountGroup->f_create_userid }}</td>
                                <td>{{ $accountGroup->f_create_date }}</td>
                                <td>{{ $accountGroup->f_modified_userid }}</td>
                                <td>{{ $accountGroup->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('account-groups.edit', $accountGroup) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $accountGroup->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('account-groups.destroy', $accountGroup) }}" method="POST" class="d-none" id="delete-form-{{ $accountGroup->f_id }}">
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
            {{ $accountGroups->links() }}
        </div>
    </div>
@endsection

