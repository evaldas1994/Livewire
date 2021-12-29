@extends('layouts.app')

@section('content')
    <a href="{{ route('banks.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/bank.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/bank.f_id')</th>
                            <th scope="col">@lang('modules/bank.f_name')</th>
                            <th scope="col">@lang('modules/bank.f_bic')</th>
                            <th scope="col">@lang('modules/bank.f_code')</th>
                            <th scope="col">@lang('modules/bank.f_create_userid')</th>
                            <th scope="col">@lang('modules/bank.f_create_date')</th>
                            <th scope="col">@lang('modules/bank.f_modified_userid')</th>
                            <th scope="col">@lang('modules/bank.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banks as $bank)
                            <tr>
                                <td>{{ $bank->f_id }}</td>
                                <td>{{ $bank->f_name }}</td>
                                <td>{{ $bank->f_bic }}</td>
                                <td>{{ $bank->f_code }}</td>
                                <td>{{ $bank->f_create_userid }}</td>
                                <td>{{ $bank->f_create_date }}</td>
                                <td>{{ $bank->f_modified_userid }}</td>
                                <td>{{ $bank->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('banks.edit', $bank) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bank->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('banks.destroy', $bank) }}" method="POST" class="d-none" id="delete-form-{{ $bank->f_id }}">
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
            {{ $banks->links() }}
        </div>
    </div>
@endsection

