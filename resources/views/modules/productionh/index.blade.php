@extends('layouts.app')

@section('content')
    <a href="{{ route('productionsh.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/productionh.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/productionh.f_id')</th>
                            <th scope="col">@lang('modules/productionh.f_docdate')</th>
                            <th scope="col">@lang('modules/productionh.f_docno')</th>
                            <th scope="col">@lang('modules/productionh.f_storeid')</th>
                            <th scope="col">@lang('modules/productionh.f_description')</th>
                            <th scope="col">@lang('modules/productionh.f_confirmed')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allProductionsh as $production)
                            <tr>
                                <td>{{ $production->f_id }}</td>
                                <td>{{ $production->f_docdate }}</td>
                                <td>{{ $production->f_docno }}</td>
                                <td>{{ $production->f_storeid }}</td>
                                <td>{{ $production->f_description }}</td>
                                <td>{{ $production->f_confirmed }}</td>
                                <td class="table-action">
                                    <a href="{{ route('productionsh.edit', $production) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $production->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('productionsh.destroy', $production) }}" method="POST" class="d-none" id="delete-form-{{ $production->f_id }}">
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
            {{ $allProductionsh->links() }}
        </div>
    </div>
@endsection

