@extends('layouts.app')

@section('content')
    <a href="{{ route('discount-coupons.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/discountCoupon.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/discountCoupon.f_id')</th>
                            <th scope="col">@lang('modules/discountCoupon.f_activation_date')</th>
                            <th scope="col">@lang('modules/discountCoupon.f_activation_docno')</th>
                            <th scope="col">@lang('modules/discountCoupon.f_activation_partnerid')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($discountCoupons as $coupon)
                            <tr>
                                <td>{{ $coupon->f_id }}</td>
                                <td>{{ $coupon->f_activation_date }}</td>
                                <td>{{ $coupon->f_activation_docno }}</td>
                                <td>{{ $coupon->f_debit_sum }}</td>
                                <td class="table-action">
                                    <a href="{{ route('discount-coupons.edit', $coupon) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $coupon->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('discount-coupons.destroy', $coupon) }}" method="POST" class="d-none" id="delete-form-{{ $coupon->f_id }}">
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
            {{ $discountCoupons->links() }}
        </div>
    </div>
@endsection

