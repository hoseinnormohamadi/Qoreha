@extends('layouts.app')
@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary">
            <div class="card-header">
                <h4>فعال سازی حساب کاربری</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">حساب کاربری خود را فعال کنید</p>
                <form method="post" action="/Account/ActivateAccount">
                    @csrf
                    @if($errors->first())
                        <div>{{ $errors->first() }}</div>
                    @endif
                    <div class="form-group">
                        <label for="PhoneNumber">شماره همراه</label>
                        <input id="PhoneNumber" type="text" class="form-control" name="PhoneNumber" tabindex="1" required="" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="ActivationCode">کد ارسال شده</label>
                        <input id="ActivationCode" type="number" class="form-control"  name="ActivationCode" tabindex="2" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            فعال سازی
                        </button>
                    </div>
                </form>
                <form method="POST" action="/Account/SendActivationCode">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="PhoneNumber">شماره همراه</label>
                            <input id="PhoneNumber" type="text" class="form-control" name="PhoneNumber" tabindex="1" required="" autofocus="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            درخواست کد
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
