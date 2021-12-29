@extends('layouts.app')

@section('content')
    <a href="{{ route('descriptions.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/description.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/description.f_id')</th>
                            <th scope="col">@lang('modules/description.f_description')</th>
                            <th scope="col">@lang('modules/description.f_create_userid')</th>
                            <th scope="col">@lang('modules/description.f_create_date')</th>
                            <th scope="col">@lang('modules/description.f_modified_userid')</th>
                            <th scope="col">@lang('modules/description.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($descriptions as $description)
                            <tr>
                                <td>{{ $description->f_id }}</td>
                                <td>{{ $description->f_description }}</td>
                                <td>{{ $description->f_create_userid }}</td>
                                <td>{{ $description->f_create_date }}</td>
                                <td>{{ $description->f_modified_userid }}</td>
                                <td>{{ $description->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('descriptions.edit', $description) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $description->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('descriptions.destroy', $description) }}" method="POST" class="d-none" id="delete-form-{{ $description->f_id }}">
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
            {{ $descriptions->links() }}
        </div>
    </div>
@endsection

