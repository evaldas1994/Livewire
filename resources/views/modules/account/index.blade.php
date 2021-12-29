@extends('layouts.app')

@section('content')
    <a href="{{ route('accounts.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/account.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/account.f_id')</th>
                            <th scope="col">@lang('modules/account.f_name')</th>
                            <th scope="col">@lang('modules/account.f_groupid')</th>
                            <th scope="col">@lang('modules/account.f_type')</th>
                            <th scope="col">@lang('modules/account.f_purpose')</th>
                            <th scope="col">@lang('modules/account.f_create_userid')</th>
                            <th scope="col">@lang('modules/account.f_create_date')</th>
                            <th scope="col">@lang('modules/account.f_modified_userid')</th>
                            <th scope="col">@lang('modules/account.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td>{{ $account->f_id }}</td>
                                <td>{{ $account->f_name }}</td>
                                <td>{{ $account->f_groupid }}</td>
                                <td>{{ $account->f_type }}</td>
                                <td>{{ $account->f_purpose }}</td>
                                <td>{{ $account->f_create_userid }}</td>
                                <td>{{ $account->f_create_date }}</td>
                                <td>{{ $account->f_modified_userid }}</td>
                                <td>{{ $account->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('accounts.edit', $account) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $account->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('accounts.destroy', $account) }}" method="POST" class="d-none" id="delete-form-{{ $account->f_id }}">
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
            {{ $accounts->links() }}
        </div>
    </div>
@endsection

