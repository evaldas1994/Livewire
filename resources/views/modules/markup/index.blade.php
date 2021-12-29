@extends('layouts.app')

@section('content')
    <a href="{{ route('markups.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/markup.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/markup.f_id')</th>
                            <th scope="col">@lang('modules/markup.f_stockid')</th>
                            <th scope="col">@lang('modules/markup.f_partnerid')</th>
                            <th scope="col">@lang('modules/markup.f_groupid')</th>
                            <th scope="col">@lang('modules/markup.f_storeid')</th>
                            <th scope="col">@lang('modules/markup.f_markup_perc')</th>
                            <th scope="col">@lang('modules/markup.f_include_vat')</th>
                            <th scope="col">@lang('modules/markup.f_create_userid')</th>
                            <th scope="col">@lang('modules/markup.f_create_date')</th>
                            <th scope="col">@lang('modules/markup.f_modified_userid')</th>
                            <th scope="col">@lang('modules/markup.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($markups as $markup)
                            <tr>
                                <td>{{ $markup->f_id }}</td>
                                <td>{{ $markup->f_stockid }}</td>
                                <td>{{ $markup->f_partnerid }}</td>
                                <td>{{ $markup->f_groupid }}</td>
                                <td>{{ $markup->f_storeid }}</td>
                                <td>{{ $markup->f_markup_perc }}</td>
                                <td>{{ $markup->f_include_vat }}</td>
                                <td>{{ $markup->f_create_userid }}</td>
                                <td>{{ $markup->f_create_date }}</td>
                                <td>{{ $markup->f_modified_userid }}</td>
                                <td>{{ $markup->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('markups.edit', $markup) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $markup->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('markups.destroy', $markup) }}" method="POST" class="d-none" id="delete-form-{{ $markup->f_id }}">
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
            {{ $markups->links() }}
        </div>
    </div>
@endsection

