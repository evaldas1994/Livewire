@extends('layouts.app')

@section('content')
    <a href="{{ route('loyalty-points.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/loyaltyPoint.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/loyaltyPoint.f_id')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_partner_groupid')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_discount_card')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_operator')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_validity_points')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_use_points')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_fix_points')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_create_userid')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_create_date')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_modified_userid')</th>
                            <th scope="col">@lang('modules/loyaltyPoint.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loyaltyPoints as $loyaltyPoint)
                            <tr>
                                <td>{{ $loyaltyPoint->f_id }}</td>
                                <td>{{ $loyaltyPoint->f_partner_groupid }}</td>
                                <td>{{ $loyaltyPoint->f_discount_card }}</td>
                                <td>{{ $loyaltyPoint->f_operator }}</td>
                                <td>{{ $loyaltyPoint->f_validity_points }}</td>
                                <td>{{ $loyaltyPoint->f_use_points }}</td>
                                <td>{{ $loyaltyPoint->f_fix_points }}</td>
                                <td>{{ $loyaltyPoint->f_create_userid }}</td>
                                <td>{{ $loyaltyPoint->f_create_date }}</td>
                                <td>{{ $loyaltyPoint->f_modified_userid }}</td>
                                <td>{{ $loyaltyPoint->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('loyalty-points.edit', $loyaltyPoint) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $loyaltyPoint->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('loyalty-points.destroy', $loyaltyPoint) }}" method="POST" class="d-none" id="delete-form-{{ $loyaltyPoint->f_id }}">
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
            {{ $loyaltyPoints->links() }}
        </div>
    </div>
@endsection

