@extends('layouts.app')

@section('content')
    <a href="{{ route('production-groups.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/productionGroup.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/productionGroup.f_id')</th>
                            <th scope="col">@lang('modules/productionGroup.f_name')</th>
                            <th scope="col">@lang('modules/productionGroup.f_name2')</th>
                            <th scope="col">@lang('modules/productionGroup.f_templateid1')</th>
                            <th scope="col">@lang('modules/productionGroup.f_templateid2')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productionGroups as $group)
                            <tr>
                                <td>{{ $group->f_id }}</td>
                                <td>{{ $group->f_name }}</td>
                                <td>{{ $group->f_name2 }}</td>
                                <td>{{ $group->f_templateid1 }}</td>
                                <td>{{ $group->f_templateid2 }}</td>
                                <td class="table-action">
                                    <a href="{{ route('production-groups.edit', $group) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $group->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('production-groups.destroy', $group) }}" method="POST" class="d-none" id="delete-form-{{ $group->f_id }}">
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
            {{ $productionGroups->links() }}
        </div>
    </div>
@endsection

