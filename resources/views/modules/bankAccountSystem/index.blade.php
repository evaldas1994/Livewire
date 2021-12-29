@extends('layouts.app')

@section('content')
    <a href="{{ route('bank-account-systems.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/bankAccountSystem.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/bankAccountSystem.f_id')</th>
                            <th scope="col">@lang('modules/bankAccountSystem.f_name')</th>
                            <th scope="col">@lang('modules/bankAccountSystem.f_bankid')</th>
                            <th scope="col">@lang('modules/bankAccountSystem.f_default')</th>
                            <th scope="col">@lang('modules/bankAccountSystem.f_create_userid')</th>
                            <th scope="col">@lang('modules/bankAccountSystem.f_create_date')</th>
                            <th scope="col">@lang('modules/bankAccountSystem.f_modified_userid')</th>
                            <th scope="col">@lang('modules/bankAccountSystem.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bankAccountSystems as $bankAccountSystem)
                            <tr>
                                <td>{{ $bankAccountSystem->f_id }}</td>
                                <td>{{ $bankAccountSystem->f_name }}</td>
                                <td>{{ $bankAccountSystem->f_bankid }}</td>
                                <td>{{ $bankAccountSystem->f_default }}</td>
                                <td>{{ $bankAccountSystem->f_create_userid }}</td>
                                <td>{{ $bankAccountSystem->f_create_date }}</td>
                                <td>{{ $bankAccountSystem->f_modified_userid }}</td>
                                <td>{{ $bankAccountSystem->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('bank-account-systems.edit', $bankAccountSystem) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bankAccountSystem->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('bank-account-systems.destroy', $bankAccountSystem) }}" method="POST" class="d-none" id="delete-form-{{ $bankAccountSystem->f_id }}">
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
            {{ $bankAccountSystems->links() }}
        </div>
    </div>
@endsection

