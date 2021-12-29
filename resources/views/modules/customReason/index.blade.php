@extends('layouts.app')

@section('content')
    <a href="{{ route('custom-reasons.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/customReason.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/customReason.f_id')</th>
                            <th scope="col">@lang('modules/customReason.f_description')</th>
                            <th scope="col">@lang('modules/customReason.f_create_userid')</th>
                            <th scope="col">@lang('modules/customReason.f_create_date')</th>
                            <th scope="col">@lang('modules/customReason.f_modified_userid')</th>
                            <th scope="col">@lang('modules/customReason.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customReasons as $reason)
                            <tr>
                                <td>{{ $reason->f_id }}</td>
                                <td>{{ $reason->f_description }}</td>
                                <td>{{ $reason->f_create_userid }}</td>
                                <td>{{ $reason->f_create_date }}</td>
                                <td>{{ $reason->f_modified_userid }}</td>
                                <td>{{ $reason->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('custom-reasons.edit', $reason) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $reason->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('custom-reasons.destroy', $reason) }}" method="POST" class="d-none" id="delete-form-{{ $reason->f_id }}">
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
            {{ $customReasons->links() }}
        </div>
    </div>
@endsection

