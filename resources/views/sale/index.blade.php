@extends('layouts.app')

@section('content')
    <a href="{{ route('sales.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <a href="{{ route('sales.create') }}" class="btn btn-secondary float-end mt-n1"><i class="fas fa-hashtag"></i></a>
    <div class="mb-3">
        <h1>@lang('modules/sales.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered data" data-rtc-resizable-table="sale.index">
                        <thead>
                        <tr>
                            <th data-rtc-resizable="f_docno">@lang('modules/sales.f_docno')</th>
                            <th data-rtc-resizable="f_storeid1">@lang('modules/sales.f_storeid1')</th>
                            <th data-rtc-resizable="f_partnerid1">@lang('modules/sales.f_partnerid1')</th>
                            <th scope="col">@lang('modules/sales.f_partnerid1_name')</th>
                            <th scope="col">@lang('modules/sales.f_create_userid')</th>
                            <th scope="col">@lang('modules/sales.f_create_date')</th>
                            <th scope="col">@lang('modules/sales.f_modified_userid')</th>
                            <th scope="col">@lang('modules/sales.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->f_docno }}</td>
                                <td>{{ $sale->f_storeid1 }}</td>
                                <td>{{ $sale->f_partnerid1 }}</td>
                                <td>{{ $sale->partner1->f_name }}</td>
                                <td >{{ $sale->f_create_userid }}</td>
                                <td >{{ $sale->f_create_date }}</td>
                                <td >{{ $sale->f_modified_userid }}</td>
                                <td >{{ $sale->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('sales.edit',$sale) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $sale->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('sales.destroy',$sale) }}" method="POST" class="d-none" id="delete-form-{{ $sale->f_id }}">
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
            {{ $sales->links() }}
        </div>
    </div>
@endsection
