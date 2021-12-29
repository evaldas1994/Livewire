@extends('layouts.app')

@section('content')
    <a href="{{ route('stores.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/store.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/store.f_id')</th>
                            <th scope="col">@lang('modules/store.f_name')</th>
                            <th scope="col">@lang('modules/store.f_address')</th>
                            <th scope="col">@lang('modules/store.f_accountid')</th>
                            <th scope="col">@lang('modules/store.f_iln_edisoft')</th>
                            <th scope="col">@lang('modules/store.f_vat_code')</th>
                            <th scope="col">@lang('modules/store.f_departmentid')</th>
                            <th scope="col">@lang('modules/store.f_personid')</th>
                            <th scope="col">@lang('modules/store.f_projectid')</th>
                            <th scope="col">@lang('modules/store.f_create_userid')</th>
                            <th scope="col">@lang('modules/store.f_create_date')</th>
                            <th scope="col">@lang('modules/store.f_modified_userid')</th>
                            <th scope="col">@lang('modules/store.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $store)
                            <tr>
                                <td>{{ $store->f_id }}</td>
                                <td>{{ $store->f_name }}</td>
                                <td>{{ $store->f_address }}</td>
                                <td>{{ $store->f_accountid }}</td>
                                <td>{{ $store->f_iln_edisoft }}</td>
                                <td>{{ $store->f_vat_code }}</td>
                                <td>{{ $store->f_departmentid }}</td>
                                <td>{{ $store->f_personid }}</td>
                                <td>{{ $store->f_projectid }}</td>
                                <td>{{ $store->f_create_userid }}</td>
                                <td>{{ $store->f_create_date }}</td>
                                <td>{{ $store->f_modified_userid }}</td>
                                <td>{{ $store->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('stores.edit', $store) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $store->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('stores.destroy', $store) }}" method="POST" class="d-none" id="delete-form-{{ $store->f_id }}">
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
            {{ $stores->links() }}
        </div>
    </div>
@endsection

