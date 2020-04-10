@extends('layouts.app')
@section('content')
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
            <div class="card-header">
                <h4>ثبت نام</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">

                        <label for="name">نام کاربری</label>
                        <input id="name" type="text" class="form-control @error('name') border border-danger @enderror" name="name"
                               autofocus="" value="{{ old('name') }}">
                        @error('name')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input id="email" type="email"
                               class="form-control @error('email') border border-danger @enderror"
                               name="email" value="{{ old('email') }}">
                        @error('email')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">کلمه عبور</label>
                            <input id="password" type="password" class="form-control pwstrength  @error('password') border border-danger @enderror"
                                   data-indicator="pwindicator" name="password">
                            <div id="pwindicator" class="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="password2" class="d-block">تایید رمز عبور</label>
                            <input id="password2" type="password" class="form-control @error('password') border border-danger @enderror"
                                   name="password_confirmation">
                        </div>

                    </div>
                    @error('password')
                    <strong>{{ $message }}</strong>
                    <br>
                    <br>
                    @enderror
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" onchange='handleChange(this);' name="agree"
                                   class="custom-control-input" id="agree">
                            <label class="custom-control-label" for="agree">من با شرایط و ضوابط
                                موافقم</label>
                        </div>
                    </div>
                    <div class="form-group">

                        <button type="submit" id="submit" disabled class="btn btn-primary btn-lg btn-block">
                            ثبت نام
                        </button>
                    </div>
                </form>
            </div>
            <div class="mb-4 text-muted text-center">
                قبلاً ثبت نام کرده اید؟ <a href="{{ route('login') }}">ورود</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function handleChange(checkbox) {
            if (checkbox.checked === true) {
                document.getElementById("submit").removeAttribute("disabled");
            } else {
                document.getElementById("submit").setAttribute("disabled", "disabled");
            }
        }
    </script>
    @endsection
