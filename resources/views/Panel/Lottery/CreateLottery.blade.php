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
            <li class="breadcrumb-item">قرعه کشی</li>
            <li class="breadcrumb-item">ایجاد قرعه کشی</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>قرعه کشی جدیدی ایجاد کنید</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Lottery/Create" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LotteryTitle') text-danger @enderror">عنوان</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text" class="form-control @error('LotteryTitle') border border-danger @enderror" name="LotteryTitle">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('LotteryContent') text-danger @enderror">محتوا</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="LotteryContent"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('LotteryImage') text-danger @enderror">تصویر جدید نوشته</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview text-danger">
                                            <label for="image-upload" id="image-label">انتخاب فایل</label>
                                            <input type="file" name="LotteryImage" id="image-upload">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">دسته بندی
                                        ها</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="PostTags">
                                            <option>انتخاب دسته بندی</option>
                                            @foreach($Tags as $tag)
                                                <option name="LotteryTags" value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LotteryFirstPrize') text-danger @enderror">جایزه اصلی</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text" class="form-control @error('LotteryFirstPrize') border border-danger @enderror" name="LotteryFirstPrize">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">

                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LotteryPrizes') text-danger @enderror">دیگر جوایز</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <small>جایزه ها را با - از هم جدا کنید</small>

                                        <input type="text" class="form-control @error('LotteryPrizes') border border-danger @enderror" name="LotteryPrizes">
                                    </div>

                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">نوع قرعه کشی</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="LotteryType">
                                            <option name="LotteryType" value="Digital">دیجیتال</option>
                                            <option name="LotteryType" value="Traditional">سنتی</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">تاریخ قرعه کشی</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input class="form-control" type="date" name="LotteryDate">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">وضعیت</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="LotteryStatus">
                                            <option name="LotteryStatus" value="Published">انتشار</option>
                                            <option name="LotteryStatus" value="Draft">پیش نویس</option>
                                            <option name="LotteryStatus" value="Archive">بایگانی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">ایجاد قرعه کشی</button>
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
