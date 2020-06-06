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
                <a href="/panel/User/Upgrade">
                    ارتقاء سطح دسترسی
                </a>
            </li>
        </ul>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="padding-20">
                            <h4>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                @endif
                            </h4>
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                @if(Auth::user()->Rule == 'User')
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Supervisor"
                                       role="tab"
                                       aria-selected="true">درخواست ناظر شدن</a>
                                </li>
                                @endif
                                @if(Auth::user()->Rule == 'Supervisor')
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Manager" role="tab"
                                       aria-selected="false">درخواست اوپراتور شدن</a>
                                </li>
                                @endif
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#LotteryOwner" role="tab"
                                           aria-selected="false">درخواست صاحب کسب و کار شدن</a>
                                    </li>

                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                @if(Auth::user()->Rule == 'User')
                                <div class="tab-pane fade show active" id="Supervisor" role="tabpanel"
                                     aria-labelledby="home-tab2">
                                    <form method="POST" action="/panel/User/UpgradeToSupervisor"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('CodeMeli') text-danger @enderror">کد ملی</label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="number"
                                                       class="form-control @error('CodeMeli') border border-danger @enderror"
                                                       name="CodeMeli" value="{{old('CodeMeli')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Address') text-danger @enderror">آدرس محل سکونت</label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="text"
                                                       class="form-control @error('Address') border border-danger @enderror"
                                                       name="Address" value="{{old('Address')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('About') text-danger @enderror">درباره درخواست</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="form-control summary-info" name="About">{{old('About')}}</textarea>
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('identityCartPic') text-danger @enderror">عکس کارت شناسایی</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview" class="image-preview text-danger">
                                                    <label for="image-upload" id="image-label">انتخاب فایل</label>
                                                    <input type="file" name="identityCartPic" id="image-upload">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">ارسال درخواست</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                @endif
                                @if(Auth::user()->Rule == 'Supervisor')
                                <div class="tab-pane fade" id="Manager" role="tabpanel" aria-labelledby="profile-tab2">
                                    <form method="POST" action="/panel/User/UpgradeToManager"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('CodeMeli') text-danger @enderror">کد ملی</label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="number"
                                                       class="form-control @error('CodeMeli') border border-danger @enderror"
                                                       name="CodeMeli" value="{{old('CodeMeli')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Address') text-danger @enderror">آدرس محل سکونت</label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input type="text"
                                                       class="form-control @error('Address') border border-danger @enderror"
                                                       name="Address" value="{{old('Address')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('About') text-danger @enderror">درباره درخواست</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="form-control summary-info" name="About">{{old('About')}}</textarea>
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('identityCartPic') text-danger @enderror">عکس کارت شناسایی</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview" class="image-preview text-danger">
                                                    <label for="image-upload" id="image-label">انتخاب فایل</label>
                                                    <input type="file" name="identityCartPic" id="image-upload">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">ارسال درخواست</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                    @endif
                                    <div class="tab-pane fade" id="LotteryOwner" role="tabpanel" aria-labelledby="profile-tab2">
                                        <form method="POST" action="/panel/User/UpgradeToLotteryOwner"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('CodeMeli') text-danger @enderror">کد ملی</label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="number"
                                                           class="form-control @error('CodeMeli') border border-danger @enderror"
                                                           name="CodeMeli" value="{{old('CodeMeli')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Address') text-danger @enderror">آدرس محل سکونت</label>
                                                <div class="col-sm-12 col-md-7 ">
                                                    <input type="text"
                                                           class="form-control @error('Address') border border-danger @enderror"
                                                           name="Address" value="{{old('Address')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('About') text-danger @enderror">درباره درخواست</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea class="form-control summary-info" name="About">{{old('About')}}</textarea>
                                                </div>
                                            </div>



                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('identityCartPic') text-danger @enderror">عکس کارت شناسایی</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div id="image-preview" class="image-preview text-danger">
                                                        <label for="image-upload" id="image-label">انتخاب فایل</label>
                                                        <input type="file" name="identityCartPic" id="image-upload">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button class="btn btn-primary">ارسال درخواست</button>
                                                </div>
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
