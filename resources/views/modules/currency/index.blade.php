@extends('layouts.app')

@section('content')
    <a href="{{ route('currencies.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/currency.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/currency.f_id')</th>
                            <th scope="col">@lang('modules/currency.f_name')</th>
                            <th scope="col">@lang('modules/currency.f_symbol')</th>
                            <th scope="col">@lang('modules/currency.f_fraction')</th>
                            <th scope="col">@lang('modules/currency.f_create_userid')</th>
                            <th scope="col">@lang('modules/currency.f_create_date')</th>
                            <th scope="col">@lang('modules/currency.f_modified_userid')</th>
                            <th scope="col">@lang('modules/currency.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($currencies as $currency)
                            <tr>
                                <td>{{ $currency->f_id }}</td>
                                <td>{{ $currency->f_name }}</td>
                                <td>{{ $currency->f_symbol }}</td>
                                <td>{{ $currency->f_fraction }}</td>
                                <td>{{ $currency->f_create_userid }}</td>
                                <td>{{ $currency->f_create_date }}</td>
                                <td>{{ $currency->f_modified_userid }}</td>
                                <td>{{ $currency->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('currencies.edit', $currency ) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $currency->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('currencies.destroy', $currency) }}" method="POST" class="d-none" id="delete-form-{{ $currency->f_id }}">
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
            {{ $currencies->links() }}
        </div>
    </div>
@endsection

