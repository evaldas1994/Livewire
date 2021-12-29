@extends('layouts.app')

@section('content')
    <a href="{{ route('discountsh.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/discounth.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="discount">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/discounth.f_id')</th>
                            <th scope="col">@lang('modules/discounth.f_valid_from')</th>
                            <th scope="col">@lang('modules/discounth.f_valid_till')</th>
                            <th scope="col">@lang('modules/discounth.f_maxwinning')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($discounts as $discount)
                            <tr>
                                <td>{{ $discount->f_id }}</td>
                                <td>{{ $discount->f_valid_from }}</td>
                                <td>{{ $discount->f_valid_till }}</td>
                                <td>{{ $discount->f_maxwinning }}</td>
                                <td class="table-action">
                                    <a href="{{ route('discountsh.edit', $discount) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $discount->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('discountsh.destroy', $discount) }}" method="POST" class="d-none" id="delete-form-{{ $discount->f_id }}">
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
            {{ $discounts->links() }}
        </div>
    </div>
@endsection

