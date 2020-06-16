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
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">قرعه کشی خانگی</li>
            <li class="breadcrumb-item">افزودن</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>قرعه کشی خانگی جدیدی ایجاد کنید</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/HomeLottery/Add" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Name') text-danger @enderror">
                                        نام
                                    </label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Name') border border-danger @enderror"
                                               name="Name" value="{{old('Name')}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Description') text-danger @enderror">توضیحات</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="Description">{{old('Description')}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Image') text-danger @enderror">تصویر</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview text-danger">
                                            <label for="image-upload" id="image-label">انتخاب فایل</label>
                                            <input type="file" name="Image" id="image-upload">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Members') text-danger @enderror">اعضا</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <small>شماره تلفن عضو هارا با - از هم جدا کنید</small>
                                        <input type="text"
                                               class="form-control @error('Members') border border-danger @enderror"
                                               name="Members" value="{{old('Members')}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Amount') text-danger @enderror">مبلغ کل قرعه کشی</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="number"
                                               class="form-control @error('Amount') border border-danger @enderror"
                                               name="Amount" value="{{old('Amount')}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Payment') text-danger @enderror">مبلغ هر پرداختی</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="number"
                                               class="form-control @error('Payment') border border-danger @enderror"
                                               name="Payment" value="{{old('Payment')}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">نوع</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="Type">
                                            <option name="Type" disabled selected>نوع قرعه کشی را انتحاب کنید</option>
                                            <option name="Type" @if(old('Type') == 'Online') selected @endif value="Online">آنلاین</option>
                                            <option name="Type" @if(old('Type') == 'Offline') selected @endif value="Offline">آفلاین</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">دوره</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="Period">
                                            <option name="Period" disabled selected>دوره را انتحاب کنید</option>
                                            <option name="Period" @if(old('Period') == 'Weekly') selected @endif value="Weekly">هفتگی</option>
                                            <option name="Period" @if(old('Period') == 'twoweeks') selected @endif value="twoweeks">۲ هفته</option>
                                            <option name="Period" @if(old('Period') == 'monthly') selected @endif value="monthly">ماهانه</option>
                                            <option name="Period" @if(old('Period') == 'twomonths') selected @endif value="twomonths">۲ ماهه</option>
                                            <option name="Period" @if(old('Period') == 'threemonths') selected @endif value="threemonths">۳ ماهه</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('StartDate') text-danger @enderror">تاریخ شروع</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="date"
                                               class="form-control @error('StartDate') border border-danger @enderror"
                                               name="StartDate" value="{{old('StartDate')}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">ایجاد</button>
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
