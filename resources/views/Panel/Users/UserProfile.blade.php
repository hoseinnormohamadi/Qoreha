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
                                <img alt="Profile" src="{{$User->ProfileImage}}"
                                     class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                    <a>{{$User->Username}}</a>
                                </div>
                                <div class="author-box-job">{{\App\User::GetRuleNameByRule($User->Rule)}}</div>
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
                      {{\Verta::instance($User->created_at)->format('d m Y')}}
                        </span>
                                </p>
                                <p class="clearfix">
                        <span class="float-left">
                          تلفن
                         </span>
                                    <span class="float-right text-muted">
                          {{$User->PhoneNumber}}
                        </span>
                                </p>
                                <p class="clearfix">
                        <span class="float-left">
                            ایمیل
                         </span>
                                    <span class="float-right text-muted">
                         {{$User->email}}
                        </span>
                                </p>
                                @if($User->FaceBook)
                                    <p class="clearfix">
                        <span class="float-left">
                          فیس بوک
                         </span>
                                        <span class="float-right text-muted"><a
                                                href="https://facebook.com/{{$User->FaceBook}}">{{$User->FaceBook}}</a></span><span
                                            class="float-right text-muted">
                          <a href="#"></a>
                        </span>
                                    </p>
                                @endif
                                @if($User->Twitter)
                                    <p class="clearfix">
                        <span class="float-left">
                          توییتر
                         </span>
                                        <span class="float-right text-muted"><a
                                                href="https://twitter.com/{{$User->Twitter}}">{{$User->Twitter}}</a></span><span
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

                            <div class="row">
                                <div class="col-md-3 col-6 b-r">
                                    <strong>نام و نام خانوادگی</strong>
                                    <br>
                                    <p class="text-muted">{{\App\User::GetUserFullName($User->FirstName,$User->LastName)}}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>تلفن</strong>
                                    <br>
                                    <p class="text-muted">{{$User->PhoneNumber}}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>ایمیل</strong>
                                    <br>
                                    <p class="text-muted">{{$User->email}}</p>
                                </div>
                                <div class="col-md-3 col-6">
                                    <strong>تاریخ عضویت</strong>
                                    <br>
                                    <p class="text-muted">{{\Verta::instance($User->created_at)->format('d m Y')}}</p>
                                </div>
                            </div>
                            <p class="m-t-30">{{$User->Bio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
