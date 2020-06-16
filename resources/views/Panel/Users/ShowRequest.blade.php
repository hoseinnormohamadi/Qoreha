@extends('Panel.Layuot')
@section('content')

    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
                <a href="/panel">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="/panel/Users/">
                    کاربران
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="/panel/Users/ManageRequest/">
                    درخواست های ارتقاء سطح دسترسی
                </a>
            </li>
        </ul>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card author-box">
                        <div class="card-body">
                            <div class="author-box-center">
                                <img alt="Profile" src="{{$Request->User->ProfileImage}}"
                                     class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                    <a>{{$Request->User->Username}}</a>
                                </div>
                                <div class="author-box-job">{{\App\User::GetRuleNameByRule($Request->User->Rule)}}</div>
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
                      {{\Verta::instance($Request->User->created_at)->format('d m Y')}}
                        </span>
                                </p>
                                <p class="clearfix">
                        <span class="float-left">
                          تلفن
                         </span>
                                    <span class="float-right text-muted">
                          {{$Request->User->PhoneNumber}}
                        </span>
                                </p>
                                <p class="clearfix">
                        <span class="float-left">
                            ایمیل
                         </span>
                                    <span class="float-right text-muted">
                         {{$Request->User->email}}
                        </span>
                                </p>
                                @if($Request->User->FaceBook)
                                    <p class="clearfix">
                        <span class="float-left">
                          فیس بوک
                         </span>
                                        <span class="float-right text-muted"><a
                                                href="https://facebook.com/{{$Request->User->FaceBook}}">{{$Request->User->FaceBook}}</a></span><span
                                            class="float-right text-muted">
                          <a href="#"></a>
                        </span>
                                    </p>
                                @endif
                                @if($Request->User->Twitter)
                                    <p class="clearfix">
                        <span class="float-left">
                          توییتر
                         </span>
                                        <span class="float-right text-muted"><a
                                                href="https://twitter.com/{{$Request->User->Twitter}}">{{$Request->User->Twitter}}</a></span><span
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
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#PrivacyContent"
                                       role="tab"
                                       aria-selected="false">مشخصات ارسال شده</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Result" role="tab"
                                       aria-selected="false">نتیجه بررسی</a>
                                </li>

                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                     aria-labelledby="home-tab2">
                                    <div class="row">
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>نام و نام خانوادگی</strong>
                                            <br>
                                            <p class="text-muted">{{\App\User::GetUserFullName($Request->User->FirstName,$Request->User->LastName)}}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>تلفن</strong>
                                            <br>
                                            <p class="text-muted">{{$Request->User->PhoneNumber}}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>ایمیل</strong>
                                            <br>
                                            <p class="text-muted">{{$Request->User->email}}</p>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <strong>تاریخ عضویت</strong>
                                            <br>
                                            <p class="text-muted">{{\Verta::instance($Request->User->created_at)->format('d m Y')}}</p>
                                        </div>
                                    </div>
                                    <p class="m-t-30">{{$Request->User->Bio}}</p>


                                </div>
                                <div class="tab-pane fade" id="PrivacyContent" role="tabpanel"
                                     aria-labelledby="profile-tab2">
                                    <div class="card-header">
                                        <h4>مشخصات ارسالی توسط کاربر</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>آدرس محل سکونت</label>
                                                <p>
                                                    {{$Request->Address}}
                                                </p>
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label>کد ملی</label>
                                                <p>
                                                    {{$Request->CodeMeli}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>عکس کارت ملی</label>
                                                <br>
                                                <img src="{{$Request->identityCartPic}}" width="350" height="250">

                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label>درباره درخواست</label>
                                                <p>
                                                    {{$Request->About}}
                                                </p>
                                            </div>

                                            <div class="form-group col-md-12 col-12">
                                                <label>نوع درخواست</label>
                                                <p>

                                                    ارتقا از
                                                    <b>{{\App\User::GetRuleNameByRule($Request->User->Rule)}}</b> به
                                                    <b>{{\App\User::GetRuleNameByRule($Request->Type)}}</b>
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Result" role="tabpanel" aria-labelledby="profile-tab2">
                                    <div class="card-header">
                                        <h4>نتیجه بررسی درخواست کاربر</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>ایا با درخواست این کاربر مبنی بر ارتقا به سطح دسترسی
                                                    <b>{{\App\User::GetRuleNameByRule($Request->Type)}}</b> موافق هستید؟</label>
                                            </div>
                                            <form action="/panel/Users/ProcessRequest/{{$Request->id}}" method="post">
                                                @csrf
                                                <button class="btn btn-success" name="RequestAnswer" value="Agree"><i class="fas fa-check-circle"></i>ارتقاء سطح دسترسی</button>
                                                <button class="btn btn-danger" name="RequestAnswer" value="DisAgree"><i class="fas fa-times-circle"></i>رد کردن درخواست</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
