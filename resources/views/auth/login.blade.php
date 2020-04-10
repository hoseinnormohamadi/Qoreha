@extends('layouts.app')
@section('content')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="card card-primary">
        <div class="card-header">
            <h4>ورود</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">


                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input id="email" type="email" class="form-control @error('email') border border-danger @enderror" name="email" tabindex="1"
                           required="" autofocus="" value="{{ old('email') }}">
                    <div class="invalid-feedback">
                        لطفا ایمیل خود را پر کنید
                    </div>
                </div>
                <div class="form-group">


                    @if (Route::has('password.request'))
                        <div class="d-block">
                            <label for="password" class="control-label">کلمه عبور</label>
                            <div class="float-right">
                                <a href="{{ route('password.request') }}" class="text-small">
                                    رمز عبور را فراموش کرده اید؟
                                </a>
                            </div>
                        </div>
                    @endif



                    <input id="password" type="password" class="form-control @error('email') border border-danger @enderror" name="password"
                           tabindex="2" required autocomplete="current-password">
                    <div class="invalid-feedback">
                        لطفا رمز عبور خود را وارد کنید
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember-me">
                        <label class="custom-control-label" for="remember-me">مرا به خاطر بسپار</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        ورود
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        حساب ندارید؟ <a href="{{ route('register') }}">یکی بساز</a>
    </div>
</div>
@endsection

