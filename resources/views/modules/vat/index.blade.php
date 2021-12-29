@extends('layouts.app')

@section('content')
    <a href="{{ route('vats.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/vat.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered table-hover data" data-rtc-resizable-table="vat.index">
                        <thead>
                        <tr>
                            <th data-rtc-resizable="f_id">@lang('modules/vat.f_id')</th>
                            <th data-rtc-resizable="f_name">@lang('modules/vat.f_name')</th>
                            <th data-rtc-resizable="f_vat_perc">@lang('modules/vat.f_vat_perc')</th>
                            <th data-rtc-resizable="f_default_vat2_id">@lang('modules/vat.f_default_vat2_id')</th>
                            <th data-rtc-resizable="f_priority_in_integrations">@lang('modules/vat.f_priority_in_integrations')</th>
                            <th data-rtc-resizable="f_create_userid">@lang('modules/vat.f_create_userid')</th>
                            <th data-rtc-resizable="f_create_date">@lang('modules/vat.f_create_date')</th>
                            <th data-rtc-resizable="f_modified_userid">@lang('modules/vat.f_modified_userid')</th>
                            <th data-rtc-resizable="f_modified_date">@lang('modules/vat.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($vats as $vat)
                                <tr>
                                    <td>{{ $vat->f_id }}</td>
                                    <td class="">@limit($vat->f_name)</td>
                                    <td>{{ $vat->f_vat_perc }}</td>
                                    <td>{{ $vat->f_default_vat2_id }}</td>
                                    <td>@lang('global.checkbox'.$vat->f_priority_in_integrations)</td>
                                    <td>{{ $vat->f_create_userid }}</td>
                                    <td>{{ $vat->f_create_date }}</td>
                                    <td>{{ $vat->f_modified_userid }}</td>
                                    <td>{{ $vat->f_modified_date }}</td>
                                    <td class="table-action">
                                        <a href="{{ route('vats.edit',$vat) }}"><i class="align-middle text-primary" data-feather="edit-2"></i></a>
                                        <x-buttons.delete>
                                            <x-slot name="route">{{ route('vats.destroy',$vat) }}</x-slot>
                                            <x-slot name="id">{{ $vat->f_id }}</x-slot>
                                        </x-buttons.delete>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $vats->links() }}
        </div>
    </div>
@endsection
