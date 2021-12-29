@extends('layouts.app')

@section('content')
    <a href="{{ route('taxesd.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/taxd.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/taxd.f_id')</th>
                            <th scope="col">@lang('modules/taxd.f_name')</th>
                            <th scope="col">@lang('modules/taxd.f_department_name')</th>
                            <th scope="col">@lang('modules/taxd.f_tax_code')</th>
                            <th scope="col">@lang('modules/taxd.f_create_userid')</th>
                            <th scope="col">@lang('modules/taxd.f_create_date')</th>
                            <th scope="col">@lang('modules/taxd.f_modified_userid')</th>
                            <th scope="col">@lang('modules/taxd.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($taxesd as $taxd)
                            <tr>
                                <td>{{ $taxd->f_id }}</td>
                                <td>{{ $taxd->f_name }}</td>
                                <td>{{ $taxd->f_department_name }}</td>
                                <td>{{ $taxd->f_tax_code }}</td>
                                <td>{{ $taxd->f_create_userid }}</td>
                                <td>{{ $taxd->f_create_date }}</td>
                                <td>{{ $taxd->f_modified_userid }}</td>
                                <td>{{ $taxd->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('taxesd.edit', $taxd) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $taxd->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('taxesd.destroy', $taxd) }}" method="POST" class="d-none" id="delete-form-{{ $taxd->f_id }}">
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
            {{ $taxesd->links() }}
        </div>
    </div>
@endsection

