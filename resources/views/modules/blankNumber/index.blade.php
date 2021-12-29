@extends('layouts.app')

@section('content')
    <a href="{{ route('blank-numbers.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/blankNumber.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/blankNumber.f_counterid')</th>
                            <th scope="col">@lang('modules/blankNumber.f_op')</th>
                            <th scope="col">@lang('modules/blankNumber.f_storeid')</th>
                            <th scope="col">@lang('modules/blankNumber.f_groupid')</th>
                            <th scope="col">@lang('modules/blankNumber.f_invoice_register')</th>
                            <th scope="col">@lang('modules/blankNumber.f_create_userid')</th>
                            <th scope="col">@lang('modules/blankNumber.f_create_date')</th>
                            <th scope="col">@lang('modules/blankNumber.f_modified_userid')</th>
                            <th scope="col">@lang('modules/blankNumber.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blankNumbers as $blankNumber)
                            <tr>
                                <td>{{ $blankNumber->f_counterid }}</td>
                                <td>{{ $blankNumber->f_op }}</td>
                                <td>{{ $blankNumber->f_storeid }}</td>
                                <td>{{ $blankNumber->f_groupid }}</td>
                                <td>{{ $blankNumber->f_invoice_register }}</td>
                                <td>{{ $blankNumber->f_create_userid }}</td>
                                <td>{{ $blankNumber->f_create_date }}</td>
                                <td>{{ $blankNumber->f_modified_userid }}</td>
                                <td>{{ $blankNumber->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('blank-numbers.edit', $blankNumber) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $blankNumber->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('blank-numbers.destroy', $blankNumber) }}" method="POST" class="d-none" id="delete-form-{{ $blankNumber->f_id }}">
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
            {{ $blankNumbers->links() }}
        </div>
    </div>
@endsection

