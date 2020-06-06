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
            <li class="breadcrumb-item">ویرایش کاربر</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>کاربر را ویرایش کنید.</h4>
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
                            <form method="POST" action="/panel/Users/Edit/{{$User->id}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Username') text-danger @enderror">نام
                                        کاربری</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Username') border border-danger @enderror"
                                               name="Username" value="{{$User->Username}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('FirstName') text-danger @enderror">نام</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('FirstName') border border-danger @enderror"
                                               name="FirstName" value="{{$User->FirstName}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LastName') text-danger @enderror">نام
                                        خانوادگی</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('LastName') border border-danger @enderror"
                                               name="LastName" value="{{$User->LastName}}">
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
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Bio') text-danger @enderror">درباره کاربر</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <textarea class="form-control @error('Bio') border border-danger @enderror summernote-simple"
                                                  name="Bio">{{$User->Bio}}</textarea>
                                    </div>
                                </div>





                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('PhoneNumber') text-danger @enderror">شماره تلفن</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('PhoneNumber') border border-danger @enderror"
                                               name="PhoneNumber" value="{{$User->PhoneNumber}}">
                                    </div>
                                </div>





                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('email') text-danger @enderror">ایمیل</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('email') border border-danger @enderror"
                                               name="email" value="{{$User->email}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Rule') text-danger @enderror">سطح دسترسی</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('Rule') border border-danger @enderror" name="Rule">
                                            <option name="Rule" value="User" @if($User->Rule == 'User') selected @endif>کاربر ساده</option>
                                            <option name="Rule" value="Supervisor" @if($User->Rule == 'Supervisor') selected @endif>ناظر</option>
                                            <option name="Rule" value="LotteryOwner" @if($User->Rule == 'LotteryOwner') selected @endif>صاحب کسب و کار</option>
                                            <option name="Rule" value="Manager" @if($User->Rule == 'Manager') selected @endif>اپراتور</option>
                                            <option name="Rule" value="Admin" @if($User->Rule == 'Admin') selected @endif>مدیر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('FaceBook') text-danger @enderror">ایدی فیسبوک</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('FaceBook') border border-danger @enderror"
                                               name="FaceBook" value="{{$User->FaceBook}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Twitter') text-danger @enderror">ایدی تویتر</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Twitter') border border-danger @enderror"
                                               name="Twitter" value="{{$User->Twitter}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('AccountStatus') text-danger @enderror">حساب کاربری فعال؟</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="checkbox"
                                               class="form-check-input @error('AccountStatus') border border-danger @enderror"
                                               name="AccountStatus" @if($User->AccountStatus == 'Active') checked @endif >
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">بروزرسانی کاربر</button>
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
