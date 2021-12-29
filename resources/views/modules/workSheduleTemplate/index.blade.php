@extends('layouts.app')

@section('content')
    <a href="{{ route('work-shedule-templates.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/workSheduleTemplate.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_id')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_from')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_till')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_break_from')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_break_till')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_break_from2')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_break_till2')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_create_userid')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_create_date')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_modified_userid')</th>
                            <th scope="col">@lang('modules/workSheduleTemplate.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workSheduleTemplates as $template)
                            <tr>
                                <td>{{ $template->f_id }}</td>
                                <td>{{ $template->f_from }}</td>
                                <td>{{ $template->f_till }}</td>
                                <td>{{ $template->f_break_from }}</td>
                                <td>{{ $template->f_break_till }}</td>
                                <td>{{ $template->f_break_from2 }}</td>
                                <td>{{ $template->f_break_till2 }}</td>
                                <td>{{ $template->f_create_userid }}</td>
                                <td>{{ $template->f_create_date }}</td>
                                <td>{{ $template->f_modified_userid }}</td>
                                <td>{{ $template->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('work-shedule-templates.edit', $template) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $template->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('work-shedule-templates.destroy', $template) }}" method="POST" class="d-none" id="delete-form-{{ $template->f_id }}">
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
            {{ $workSheduleTemplates->links() }}
        </div>
    </div>
@endsection

