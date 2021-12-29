@extends('layouts.app')

@section('content')
    <a href="{{ route('projects.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/project.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/project.f_id')</th>
                            <th scope="col">@lang('modules/project.f_name')</th>
                            <th scope="col">@lang('modules/project.f_name2')</th>
                            <th scope="col">@lang('modules/project.f_create_userid')</th>
                            <th scope="col">@lang('modules/project.f_create_date')</th>
                            <th scope="col">@lang('modules/project.f_modified_userid')</th>
                            <th scope="col">@lang('modules/project.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->f_id }}</td>
                                <td>{{ $project->f_name }}</td>
                                <td>{{ $project->f_name2 }}</td>
                                <td>{{ $project->f_create_userid }}</td>
                                <td>{{ $project->f_create_date }}</td>
                                <td>{{ $project->f_modified_userid }}</td>
                                <td>{{ $project->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('projects.edit', $project ) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $project->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-none" id="delete-form-{{ $project->f_id }}">
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
            {{ $projects->links() }}
        </div>
    </div>
@endsection

