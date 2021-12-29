@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/store.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('store-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('stores.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="store-form" action="{{ route('stores.update', $store) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/store.f_id')"
                                   required
                                   maxlength="40"
                                   value="{{ old('f_id', $store->f_id)}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/store.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name', $store->f_name)}}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_name2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name2') is-invalid @enderror"
                                   name="f_name2"
                                   placeholder="@lang('modules/store.f_name2')"
                                   maxlength="100"
                                   value="{{ old('f_name2', $store->f_name2)}}">
                            @error('f_name2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_address')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_address') is-invalid @enderror"
                                   name="f_address"
                                   placeholder="@lang('modules/store.f_address')"
                                   maxlength="100"
                                   value="{{ old('f_address', $store->f_address)}}">
                            @error('f_address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_accountid')</label>
                            <select class="form-control form-control-sm @error('f_accountid') is-invalid @enderror" name="f_accountid">
                                <option value selected>---</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->f_id }}" {{ selected('f_accountid', $account->f_id, $store->f_accountid) }}>{{ $account->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_accountid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_f1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_f1') is-invalid @enderror"
                                   name="f_f1"
                                   placeholder="@lang('modules/store.f_f1')"
                                   maxlength="1000"
                                   value="{{ old('f_f1', $store->f_f1)}}">
                            @error('f_f1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_f2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_f2') is-invalid @enderror"
                                   name="f_f2"
                                   placeholder="@lang('modules/store.f_f2')"
                                   maxlength="1000"
                                   value="{{ old('f_f2', $store->f_f2)}}">
                            @error('f_f2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_f3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_f3') is-invalid @enderror"
                                   name="f_f3"
                                   placeholder="@lang('modules/store.f_f3')"
                                   maxlength="1000"
                                   value="{{ old('f_f3', $store->f_f3)}}">
                            @error('f_f3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_f4')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_f4') is-invalid @enderror"
                                   name="f_f4"
                                   placeholder="@lang('modules/store.f_f4')"
                                   maxlength="1000"
                                   value="{{ old('f_f4', $store->f_f4)}}">
                            @error('f_f4') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_f5')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_f5') is-invalid @enderror"
                                   name="f_f5"
                                   placeholder="@lang('modules/store.f_f5')"
                                   maxlength="1000"
                                   value="{{ old('f_f5', $store->f_f5)}}">
                            @error('f_f5') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_store')</label>
                            <select class="form-control form-control-sm @error('f_store') is-invalid @enderror" name="f_store">
                                <option value selected>---</option>
                                @foreach($stores as $singleStore)
                                    <option value="{{ $singleStore->f_id }}" {{ selected('f_store', $singleStore->f_id, $store->f_store) }}>{{ $singleStore->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_store') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_r1id')</label>
                            <select class="form-control form-control-sm @error('f_r1id') is-invalid @enderror" name="f_r1id">
                                <option value selected>---</option>
                                @foreach($registers1 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r1id', $register->f_id, $store->f_r1id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r1id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_r2id')</label>
                            <select class="form-control form-control-sm @error('f_r2id') is-invalid @enderror" name="f_r2id">
                                <option value selected>---</option>
                                @foreach($registers2 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r2id', $register->f_id, $store->f_r2id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r2id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_r3id')</label>
                            <select class="form-control form-control-sm @error('f_r3id') is-invalid @enderror" name="f_r3id">
                                <option value selected>---</option>
                                @foreach($registers3 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r3id', $register->f_id, $store->f_r3id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r3id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_r4id')</label>
                            <select class="form-control form-control-sm @error('f_r4id') is-invalid @enderror" name="f_r4id">
                                <option value selected>---</option>
                                @foreach($registers4 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r4id', $register->f_id, $store->f_r4id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r4id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_r5id')</label>
                            <select class="form-control form-control-sm @error('f_r5id') is-invalid @enderror" name="f_r5id">
                                <option value selected>---</option>
                                @foreach($registers5 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r5id', $register->f_id, $store->f_r5id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r5id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_departmentid')</label>
                            <select class="form-control form-control-sm @error('f_departmentid') is-invalid @enderror" name="f_departmentid">
                                <option value selected>---</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->f_id }}" {{ selected('f_departmentid', $department->f_id, $store->f_departmentid) }}>{{ $department->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_departmentid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_personid')</label>
                            <select class="form-control form-control-sm @error('f_personid') is-invalid @enderror" name="f_personid">
                                <option value selected>---</option>
                                @foreach($persons as $person)
                                    <option value="{{ $person->f_id }}" {{ selected('f_personid', $person->f_id, $store->f_personid) }}>{{ $person->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_personid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_projectid')</label>
                            <select class="form-control form-control-sm @error('f_projectid') is-invalid @enderror" name="f_projectid">
                                <option value selected>---</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->f_id }}" {{ selected('f_projectid', $project->f_id, $store->f_projectid) }}>{{ $project->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_projectid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_iln_edisoft')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_iln_edisoft') is-invalid @enderror"
                                   name="f_iln_edisoft"
                                   placeholder="@lang('modules/store.f_iln_edisoft')"
                                   maxlength="20"
                                   value="{{ old('f_iln_edisoft', $store->f_iln_edisoft)}}">
                            @error('f_iln_edisoft') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_store_email')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_store_email') is-invalid @enderror"
                                   name="f_store_email"
                                   placeholder="@lang('modules/store.f_store_email')"
                                   maxlength="300"
                                   value="{{ old('f_store_email', $store->f_store_email)}}">
                            @error('f_store_email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/store.f_vat_code')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_vat_code') is-invalid @enderror"
                                   name="f_vat_code"
                                   placeholder="@lang('modules/store.f_vat_code')"
                                   maxlength="20"
                                   value="{{ old('f_vat_code', $store->f_vat_code)}}">
                            @error('f_vat_code') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/store.f_noexported')</span>
                                <input type="hidden" name="f_noexported" value="0">
                                <input type="checkbox" name="f_noexported" class="form-check-input @error('f_noexported') is-invalid @enderror" value="{{ old('f_noexported', 1) }}"  {{ old('f_noexported', $store->f_noexported) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_noexported') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/store.f_price_by_store')</span>
                                <input type="hidden" name="f_price_by_store" value="0">
                                <input type="checkbox" name="f_price_by_store" class="form-check-input @error('f_price_by_store') is-invalid @enderror" value="{{ old('f_price_by_store', 1) }}"  {{ old('f_price_by_store', $store->f_price_by_store) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_price_by_store') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/store.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/store.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1', $store->f_system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/store.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/store.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2', $store->f_system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/store.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/store.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3', $store->f_system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
