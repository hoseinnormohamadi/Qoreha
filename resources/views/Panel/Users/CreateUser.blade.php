@extends('Panel.Layuot')
@section('content')
    @if(session('errors'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>پیام سایت</strong>
            {{session('errors')->first('msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">

            <li class="breadcrumb-item">
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">کاربران</li>
            <li class="breadcrumb-item">افزودن کاربر</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>کاربر جدیدی ایجاد کنید.</h4>
                            <h4>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <br>
                                        <br>
                                        <div>{{$error}}</div>
                                    @endforeach
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Users/Add" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Username') text-danger @enderror">نام
                                        کاربری</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Username') border border-danger @enderror"
                                               name="Username" value="{{old('Username')}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('FirstName') text-danger @enderror">نام</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('FirstName') border border-danger @enderror"
                                               name="FirstName" value="{{old('FirstName')}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LastName') text-danger @enderror">نام
                                        خانوادگی</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('LastName') border border-danger @enderror"
                                               name="LastName" value="{{old('LastName')}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('password') text-danger @enderror">
                                        کلمه عبور</label>
                                    <div class="col-sm-7 col-md-3">
                                        <input type="password"
                                               class="form-control @error('password') border border-danger @enderror"
                                               name="password" id="password">
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <input type="password"
                                               class="form-control @error('password') border border-danger @enderror"
                                               name="password_confirmation" id="password_confirmation">
                                    </div>
                                    <div class="col-sm-6 col-md-2">
                                        <button type="button" class="btn btn-info" onclick="CreatePassword()">تولید کلمه
                                            عبور
                                        </button>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('PhoneNumber') text-danger @enderror">شماره تلفن</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('PhoneNumber') border border-danger @enderror"
                                               name="PhoneNumber" value="{{old('PhoneNumber')}}">
                                    </div>
                                </div>





                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('email') text-danger @enderror">ایمیل</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('email') border border-danger @enderror"
                                               name="email" value="{{old('email')}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Rule') text-danger @enderror">سطح دسترسی</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('Rule') border border-danger @enderror" name="Rule">
                                            <option name="Rule" value="User">کاربر ساده</option>
                                            <option name="Rule" value="Supervisor">ناظر</option>
                                            <option name="Rule" value="LotteryOwner">صاحب کسب و کار</option>
                                            <option name="Rule" value="Manager">اپراتور</option>
                                            <option name="Rule" value="Admin">مدیر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">ایجاد کاربر</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="\assets\Plugin\SweetAlert2\SweetAlert2.js"></script>
    <script>
        function CreatePassword() {
            var Password = Math.random().toString(36).slice(-8);

            Swal.fire({
                title: '<strong>کلمه عبور امن ساخته شد</strong>',
                icon: 'success',
                html:
                    'لطفا کلمه عبور را جایی یاداشت کرده و یا کپی کنید' +
                    '\n'+'کلمه عبور ساخته شده‌ : '+
                    Password,
                showCloseButton: true,
                focusConfirm: true,
                confirmButtonText: 'بستن',
            })


            document.getElementById('password').value = Password;
            document.getElementById('password_confirmation').value = Password;
        }
    </script>
@endsection
