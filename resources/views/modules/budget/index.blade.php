@extends('layouts.app')

@section('content')
    <a href="{{ route('budgets.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/budget.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/budget.f_id')</th>
                            <th scope="col">@lang('modules/budget.f_accountid')</th>
                            <th scope="col">@lang('modules/budget.f_year')</th>
                            <th scope="col">@lang('modules/budget.f_month')</th>
                            <th scope="col">@lang('modules/budget.f_credit_sum')</th>
                            <th scope="col">@lang('modules/budget.f_debit_sum')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($budgets as $budget)
                            <tr>
                                <td>{{ $budget->f_id }}</td>
                                <td>{{ $budget->f_accountid }}</td>
                                <td>{{ $budget->f_year }}</td>
                                <td>{{ $budget->f_month }}</td>
                                <td>{{ $budget->f_credit_sum }}</td>
                                <td>{{ $budget->f_debit_sum }}</td>
                                <td class="table-action">
                                    <a href="{{ route('budgets.edit', $budget) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $budget->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="d-none" id="delete-form-{{ $budget->f_id }}">
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
            {{ $budgets->links() }}
        </div>
    </div>
@endsection

