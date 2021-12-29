@extends('layouts.app')
@section('content')
<main class="d-flex w-100 h-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">@lang('auth.welcome_back')</h1>
                        <p class="lead">
                            @lang('auth.login_to_continue')
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="https://media.istockphoto.com/vectors/user-sign-icon-person-symbol-human-avatar-vector-id639085642?k=20&m=639085642&s=170667a&w=0&h=Oz2wAbb8r_b8sU8k4yZ3RR4NRbe-s7GF0kxjs1aez9M=" class="img-fluid rounded-circle" width="132" height="132" />
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control form-control-lg @error('f_login') is-invalid @enderror" type="text" name="f_login" required placeholder="@lang('auth.login_placeholder')" />
                                        @error('f_login') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" required placeholder="@lang('auth.password_placeholder')" />
                                        @error('password') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">@lang('auth.btn_login')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
