@extends('layouts.app')

@section('content')
    <a href="{{ route('messages.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/message.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/message.f_id')</th>
                            <th scope="col">@lang('modules/message.f_name')</th>
                            <th scope="col">@lang('modules/message.f_groupid')</th>
                            <th scope="col">@lang('modules/message.f_days')</th>
                            <th scope="col">@lang('modules/message.f_min_sum')</th>
                            <th scope="col">@lang('modules/message.f_subject')</th>
                            <th scope="col">@lang('modules/message.f_message')</th>
                            <th scope="col">@lang('modules/message.f_create_userid')</th>
                            <th scope="col">@lang('modules/message.f_create_date')</th>
                            <th scope="col">@lang('modules/message.f_modified_userid')</th>
                            <th scope="col">@lang('modules/message.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->f_id }}</td>
                                <td>{{ $message->f_name }}</td>
                                <td>{{ $message->f_groupid }}</td>
                                <td>{{ $message->f_days }}</td>
                                <td>{{ $message->f_min_sum }}</td>
                                <td>{{ $message->f_subject }}</td>
                                <td>{{ $message->f_message }}</td>
                                <td>{{ $message->f_create_userid }}</td>
                                <td>{{ $message->f_create_date }}</td>
                                <td>{{ $message->f_modified_userid }}</td>
                                <td>{{ $message->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('messages.edit', $message) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $message->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('messages.destroy', $message) }}" method="POST" class="d-none" id="delete-form-{{ $message->f_id }}">
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
            {{ $messages->links() }}
        </div>
    </div>
@endsection

