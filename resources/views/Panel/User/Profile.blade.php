@extends('Panel.Layuot')
@section('content')
    @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                <a href="/panel">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="/panel/User/Profile">
                    مشخصات
                </a>
            </li>
        </ul>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card author-box">
                        <div class="card-body">
                            <div class="author-box-center">
                                <img alt="Profile" src="{{Auth::user()->ProfileImage}}"
                                     class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                    <a>{{Auth::user()->Username}}</a>
                                </div>
                                <div class="author-box-job">{{\App\User::GetRuleName()}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>مشخصات شخصی</h4>
                        </div>
                        <div class="card-body">
                            <div class="py-4">
                                <p class="clearfix">
                        <span class="float-left">
                          عضو از
                         </span>
                                    <span class="float-right text-muted">
                      {{\Verta::instance(Auth::user()->created_at)->format('d m Y')}}
                        </span>
                                </p>
                                <p class="clearfix">
                        <span class="float-left">
                          تلفن
                         </span>
                                    <span class="float-right text-muted">
                          {{Auth::user()->PhoneNumber}}
                        </span>
                                </p>
                                <p class="clearfix">
                        <span class="float-left">
                            ایمیل
                         </span>
                                    <span class="float-right text-muted">
                         {{Auth::user()->email}}
                        </span>
                                </p>
                               @if(Auth::user()->FaceBook)
                                <p class="clearfix">
                        <span class="float-left">
                          فیس بوک
                         </span>
                                    <span class="float-right text-muted"><a href="https://facebook.com/{{Auth::user()->FaceBook}}">{{Auth::user()->FaceBook}}</a></span><span
                                        class="float-right text-muted">
                          <a href="#"></a>
                        </span>
                                </p>
                                @endif
                                @if(Auth::user()->Twitter)
                                <p class="clearfix">
                        <span class="float-left">
                          توییتر
                         </span>
                                    <span class="float-right text-muted"><a href="https://twitter.com/{{Auth::user()->Twitter}}">{{Auth::user()->Twitter}}</a></span><span
                                        class="float-right text-muted">
                          <a href="#"></a>
                        </span>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="padding-20">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                       aria-selected="true">درباره</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                       aria-selected="false">تنظیمات عمومی</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#PicSetting"
                                       role="tab" aria-selected="false">تنظیمات عکس کاربر</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#SecuritySettings"
                                       role="tab" aria-selected="false">تنظیمات امنیتی</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                     aria-labelledby="home-tab2">
                                    <div class="row">
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>نام و نام خانوادگی</strong>
                                            <br>
                                            <p class="text-muted">{{\App\User::FullName()}}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>تلفن</strong>
                                            <br>
                                            <p class="text-muted">{{Auth::user()->PhoneNumber}}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>ایمیل</strong>
                                            <br>
                                            <p class="text-muted">{{Auth::user()->email}}</p>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <strong>تاریخ عضویت</strong>
                                            <br>
                                            <p class="text-muted">{{\Verta::instance(Auth::user()->created_at)->format('d m Y')}}</p>
                                        </div>
                                    </div>
                                    <p class="m-t-30">{{Auth::user()->Bio}}</p>


                                </div>
                                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                    <form method="post" action="/panel/User/UpdateUserInfo" class="needs-validation">
                                        @csrf
                                        <div class="card-header">
                                            <h4>ویرایش نمایه</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>نام</label>
                                                    <input type="text" class="form-control"
                                                           value="{{Auth::user()->FirstName}}"
                                                           name="FirstName"
                                                    >
                                                    <div class="invalid-feedback">
                                                        لطفاً نام خود را وارد کنید
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>نام خانوادگی</label>
                                                    <input type="text" class="form-control"
                                                           value="{{Auth::user()->LastName}}"
                                                           name="LastName"
                                                    >
                                                    <div class="invalid-feedback">
                                                        لطفا نام خانوادگی را وارد کنید
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label>ایمیل</label>
                                                    <input type="email" class="form-control"
                                                           value="{{Auth::user()->email}}"
                                                           name="email"
                                                    >
                                                    <div class="invalid-feedback">
                                                        لطفا ایمیل را پر کنید
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5 col-12">
                                                    <label>تلفن</label>
                                                    <input type="tel" class="form-control"
                                                           value="{{Auth::user()->PhoneNumber}}"
                                                           name="PhoneNumber"
                                                    >
                                                </div>

                                                <div class="form-group col-md-5 col-12">
                                                    <label>فیسبوک</label>
                                                    <input type="text" class="form-control"
                                                           value="{{Auth::user()->FaceBook}}"
                                                           name="FaceBook"
                                                    >
                                                </div>

                                                <div class="form-group col-md-5 col-12">
                                                    <label>تویتر</label>
                                                    <input type="text" class="form-control"
                                                           value="{{Auth::user()->Twitter}}"
                                                           name="Twitter"
                                                    >
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>بیو</label>
                                                    <textarea class="form-control summernote-simple"
                                                              name="Bio">{{Auth::user()->Bio}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <input class="btn btn-primary" type="submit" value="ثبت تغییرات">
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="PicSetting" role="tabpanel"
                                     aria-labelledby="profile-tab3">
                                    <form method="post" action="/panel/User/UpdatePic" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4>ویرایش عکس کاربری</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>عکس جدید</label>
                                                <input type="file" name="ProfileImage" class="form-control">
                                            </div>

                                        </div>
                                        <div class="card-footer text-right">
                                            <input  type="submit" class="btn btn-primary" value="ذخیره تغییرات">
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="SecuritySettings" role="tabpanel"
                                     aria-labelledby="profile-tab4">
                                    <form method="post" action="/panel/User/UpdatePassword">
                                        @csrf
                                        <div class="card-header">
                                            <h4>ویرایش رمزعبور</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>کلمه عبور فعلی</label>
                                                    <input type="password" class="form-control" name="OldPassword">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>کلمه عبور جدید</label>
                                                    <input type="password" class="form-control"
                                                           name="password"
                                                    >
                                                    <div class="invalid-feedback">
                                                        لطفاً کلمه عبور جدید خود را وارد کنید
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>تکرار کلمه عبور جدید</label>
                                                    <input type="password" class="form-control"
                                                           name="password_confirmation"
                                                    >
                                                    <div class="invalid-feedback">
                                                        لطفاً تکرار کلمه عبور جدید خود را وارد کنید
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-right">
                                            <input  type="submit" class="btn btn-primary" value="ذخیره تغییرات">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
