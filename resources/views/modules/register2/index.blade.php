@extends('layouts.app')

@section('content')
    <a href="{{ route('registers2.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/register2.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/register2.f_id')</th>
                            <th scope="col">@lang('modules/register2.f_name')</th>
                            <th scope="col">@lang('modules/register2.f_name2')</th>
                            <th scope="col">@lang('modules/register2.f_name3')</th>
                            <th scope="col">@lang('modules/register2.f_create_userid')</th>
                            <th scope="col">@lang('modules/register2.f_create_date')</th>
                            <th scope="col">@lang('modules/register2.f_modified_userid')</th>
                            <th scope="col">@lang('modules/register2.f_coefficient')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($registers as $register)
                            <tr>
                                <td>{{ $register->f_id }}</td>
                                <td>{{ $register->f_name }}</td>
                                <td>{{ $register->f_name2 }}</td>
                                <td>{{ $register->f_name3 }}</td>
                                <td>{{ $register->f_create_userid }}</td>
                                <td>{{ $register->f_create_date }}</td>
                                <td>{{ $register->f_modified_userid }}</td>
                                <td>{{ $register->f_coefficient }}</td>
                                <td class="table-action">
                                    <a href="{{ route('registers2.edit', $register ) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $register->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('registers2.destroy', $register) }}" method="POST" class="d-none" id="delete-form-{{ $register->f_id }}">
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
            {{ $registers->links() }}
        </div>
    </div>
@endsection

