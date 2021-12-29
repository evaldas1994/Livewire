@extends('layouts.app')

@section('content')
    <a href="{{ route('salariesh.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/salaryh.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/salaryh.f_id')</th>
                            <th scope="col">@lang('modules/salaryh.f_docdate')</th>
                            <th scope="col">@lang('modules/salaryh.f_docno')</th>
                            <th scope="col">@lang('modules/salaryh.f_blankno')</th>
                            <th scope="col">@lang('modules/salaryh.f_templateid')</th>
                            <th scope="col">@lang('modules/salaryh.f_curid')</th>
                            <th scope="col">@lang('modules/salaryh.f_name')</th>
                            <th scope="col">@lang('modules/salaryh.f_salary')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allSalariesh as $salary)
                            <tr>
                                <td>{{ $salary->f_id }}</td>
                                <td>{{ $salary->f_docdate }}</td>
                                <td>{{ $salary->f_docno }}</td>
                                <td>{{ $salary->f_blankno }}</td>
                                <td>{{ $salary->f_templateid }}</td>
                                <td>{{ $salary->f_curid }}</td>
                                <td>{{ $salary->f_name }}</td>
                                <td>{{ $salary->f_salary }}</td>
                                <td class="table-action">
                                    <a href="{{ route('salariesh.edit', $salary) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $salary->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('salariesh.destroy', $salary) }}" method="POST" class="d-none" id="delete-form-{{ $salary->f_id }}">
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
            {{ $allSalariesh->links() }}
        </div>
    </div>
@endsection

