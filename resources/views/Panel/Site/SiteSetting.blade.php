@extends('Panel.Layuot')
@section('header')
    <script src="/assets/Plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#mytextarea',
            language: 'fa',
            branding: false,
            height: 300
        });
    </script>
@endsection
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
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="padding-20">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#General"
                                       role="tab"
                                       aria-selected="true">تنظیمات کلی</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Icon" role="tab"
                                       aria-selected="false">تنظیمات آیکون</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#Social" role="tab"
                                       aria-selected="false">تنظیمات شبکه های اجتماعی</a>
                                </li>


                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade show active" id="General" role="tabpanel"
                                     aria-labelledby="home-tab2">
                                    <form method="POST" action="/panel/Site/UpdateSiteGeneral"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('SiteName') text-danger @enderror">نام
                                                سایت</label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="text"
                                                       class="form-control @error('SiteName') border border-danger @enderror"
                                                       name="SiteName" value="{{$SiteConfig->SiteName}}">
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('PhoneNumber') text-danger @enderror">
                                                شماره تماس
                                            </label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="text"
                                                       class="form-control @error('PhoneNumber') border border-danger @enderror"
                                                       name="PhoneNumber" value="{{$SiteConfig->PhoneNumber}}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Email') text-danger @enderror">
                                                ایمیل سایت
                                            </label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="text"
                                                       class="form-control @error('Email') border border-danger @enderror"
                                                       name="Email" value="{{$SiteConfig->Email}}">
                                            </div>
                                        </div>





                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Address') text-danger @enderror">
                                                آدرس
                                            </label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="text"
                                                       class="form-control @error('Address') border border-danger @enderror"
                                                       name="Address" value="{{$SiteConfig->Address}}">
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('SiteAbout') text-danger @enderror">متن
                                                درباره ما</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="mytextarea"
                                                          name="SiteAbout">{{$SiteConfig->AboutUs}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">ذخیره تغییرات</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade" id="Icon" role="tabpanel" aria-labelledby="profile-tab2">
                                    <form method="post" action="/panel/Site/UpdateSiteIcon"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4>ویرایش آیکون</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('SiteIcon') text-danger @enderror">آیکون
                                                    سایت</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div id="image-preview" class="image-preview text-danger">
                                                        <label for="image-upload" id="image-label">انتخاب فایل</label>
                                                        <input type="file" name="SiteIcon" id="image-upload">
                                                    </div>
                                                    <img src="{{\App\Site::SiteIcon()}}" width="250" height="250">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <input class="btn btn-primary" type="submit" value="ثبت تغییرات">
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-pane fade" id="Social" role="tabpanel" aria-labelledby="profile-tab3">
                                    <form method="post" action="/panel/Site/UpdateSiteSocial"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4>شبکه های اجتماعی</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Facebook') text-danger @enderror">
                                                    ایدی فیسبوک
                                                </label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="text"
                                                           class="form-control @error('Facebook') border border-danger @enderror"
                                                           name="Facebook" value="{{$SiteConfig->Facebook}}">
                                                </div>
                                            </div>



                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Telegram') text-danger @enderror">
                                                    ایدی کانال تلگرام
                                                </label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="text"
                                                           class="form-control @error('Telegram') border border-danger @enderror"
                                                           name="Telegram" value="{{$SiteConfig->Telegram}}">
                                                </div>
                                            </div>




                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('instagram') text-danger @enderror">
                                                    ایدی اینستاگرام
                                                </label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="text"
                                                           class="form-control @error('instagram') border border-danger @enderror"
                                                           name="instagram" value="{{$SiteConfig->instagram}}">
                                                </div>
                                            </div>






                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('twitter') text-danger @enderror">
                                                    ایدی تویتر
                                                </label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="text"
                                                           class="form-control @error('twitter') border border-danger @enderror"
                                                           name="twitter" value="{{$SiteConfig->twitter}}">
                                                </div>
                                            </div>


                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Enamad') text-danger @enderror">
                                                    لینک ای-نماد(Enamad.ir)
                                                </label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="text"
                                                           class="form-control @error('Enamad') border border-danger @enderror"
                                                           name="Enamad" value="{{$SiteConfig->Enamad}}">
                                                </div>
                                            </div>





                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Samandehi') text-danger @enderror">
                                                    لینک ساماندهی(Samandehi.ir)
                                                </label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="text"
                                                           class="form-control @error('Samandehi') border border-danger @enderror"
                                                           name="Samandehi" value="{{$SiteConfig->Smandehi}}">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer text-right">
                                            <input class="btn btn-primary" type="submit" value="ثبت تغییرات">
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
