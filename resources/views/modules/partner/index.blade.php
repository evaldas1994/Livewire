@extends('layouts.app')

@section('content')
    <a href="{{ route('partners.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/partner.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/partner.f_id')</th>
                            <th scope="col">@lang('modules/partner.f_name')</th>
                            <th scope="col">@lang('modules/partner.f_buyer')</th>
                            <th scope="col">@lang('modules/partner.f_seller')</th>
                            <th scope="col">@lang('modules/partner.f_groupid')</th>
                            <th scope="col">@lang('modules/partner.f_code')</th>
                            <th scope="col">@lang('modules/partner.f_vat_code')</th>
                            <th scope="col">@lang('modules/partner.f_create_userid')</th>
                            <th scope="col">@lang('modules/partner.f_create_date')</th>
                            <th scope="col">@lang('modules/partner.f_modified_userid')</th>
                            <th scope="col">@lang('modules/partner.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($partners as $partner)
                            <tr>
                                <td>{{ $partner->f_id }}</td>
                                <td>{{ $partner->f_name }}</td>
                                <td>{{ $partner->f_buyer }}</td>
                                <td>{{ $partner->f_seller }}</td>
                                <td>{{ $partner->f_groupid }}</td>
                                <td>{{ $partner->f_code }}</td>
                                <td>{{ $partner->f_vat_code }}</td>
                                <td>{{ $partner->f_create_userid }}</td>
                                <td>{{ $partner->f_create_date }}</td>
                                <td>{{ $partner->f_modified_userid }}</td>
                                <td>{{ $partner->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('partners.edit', $partner) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $partner->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('partners.destroy', $partner) }}" method="POST" class="d-none" id="delete-form-{{ $partner->f_id }}">
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
            {{ $partners->links() }}
        </div>
    </div>
@endsection

