@extends('layouts.app')

@section('content')
    <a href="{{ route('stock-groups.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/stockGroup.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/stockGroup.f_id')</th>
                            <th scope="col">@lang('modules/stockGroup.f_name')</th>
                            <th scope="col">@lang('modules/stockGroup.f_allowed_from')</th>
                            <th scope="col">@lang('modules/stockGroup.f_allowed_to')</th>
                            <th scope="col">@lang('modules/stockGroup.f_ignore_promotion')</th>
                            <th scope="col">@lang('modules/stockGroup.f_ignore_voucher')</th>
                            <th scope="col">@lang('modules/stockGroup.f_group_level')</th>
                            <th scope="col">@lang('modules/stockGroup.f_group_parent')</th>
                            <th scope="col">@lang('modules/stockGroup.f_catalog_group')</th>
                            <th scope="col">@lang('modules/stockGroup.f_ignor_gross_weight')</th>
                            <th scope="col">@lang('modules/stockGroup.f_disp_priority')</th>
                            <th scope="col">@lang('modules/stockGroup.f_perishable_goods')</th>
                            <th scope="col">@lang('modules/stockGroup.f_age_restriction')</th>
                            <th scope="col">@lang('modules/stockGroup.f_create_userid')</th>
                            <th scope="col">@lang('modules/stockGroup.f_create_date')</th>
                            <th scope="col">@lang('modules/stockGroup.f_modified_userid')</th>
                            <th scope="col">@lang('modules/stockGroup.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stockGroups as $group)
                            <tr>
                                <td>{{ $group->f_id }}</td>
                                <td>{{ $group->f_name }}</td>
                                <td>{{ $group->f_allowed_from }}</td>
                                <td>{{ $group->f_allowed_to }}</td>
                                <td>{{ $group->f_ignore_promotion }}</td>
                                <td>{{ $group->f_ignore_voucher }}</td>
                                <td>{{ $group->f_group_level }}</td>
                                <td>{{ $group->f_group_parent }}</td>
                                <td>{{ $group->f_catalog_group }}</td>
                                <td>{{ $group->f_ignor_gross_weight }}</td>
                                <td>{{ $group->f_disp_priority }}</td>
                                <td>{{ $group->f_perishable_goods }}</td>
                                <td>{{ $group->f_age_restriction }}</td>
                                <td>{{ $group->f_create_userid }}</td>
                                <td>{{ $group->f_create_date }}</td>
                                <td>{{ $group->f_modified_userid }}</td>
                                <td>{{ $group->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('stock-groups.edit', $group) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $group->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('stock-groups.destroy', $group) }}" method="POST" class="d-none" id="delete-form-{{ $group->f_id }}">
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
            {{ $stockGroups->links() }}
        </div>
    </div>
@endsection

