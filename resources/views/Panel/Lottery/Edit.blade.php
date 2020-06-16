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
            <li class="breadcrumb-item">ویرایش قرعه کشی</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>قرعه کشی را ویرایش کنید</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Lottery/Edit/{{$Lottery->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LotteryTitle') text-danger @enderror">عنوان</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text" class="form-control @error('LotteryTitle') border border-danger @enderror" name="LotteryTitle" value="{{$Lottery->LotteryTitle}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('LotteryContent') text-danger @enderror">محتوا</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="LotteryContent">{{$Lottery->LotteryContent}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('LotteryImage') text-danger @enderror">تصویر جدید نوشته</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview text-danger">
                                            <label for="image-upload" id="image-label">انتخاب فایل</label>
                                            <input type="file" name="LotteryImage" id="image-upload">
                                        </div>
                                        <img src="{{$Lottery->LotteryImage}}" width="250px" height="250px">
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
                                        <input type="text" class="form-control @error('LotteryFirstPrize') border border-danger @enderror" name="LotteryFirstPrize" value="{{$Lottery->LotteryFirstPrize}}">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">

                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LotteryPrizes') text-danger @enderror">دیگر جوایز</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <small>جایزه ها را با - از هم جدا کنید</small>

                                        <input type="text" class="form-control @error('LotteryPrizes') border border-danger @enderror" name="LotteryPrizes" value="{{json_decode($Lottery->LotteryPrizes)}}">
                                    </div>

                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">نوع قرعه کشی</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="LotteryType">
                                            <option name="LotteryType" value="Digital" @if($Lottery->LotteryType == 'Digital')  selected @endif >دیجیتال</option>
                                            <option name="LotteryType" value="Traditional" @if($Lottery->LotteryType == 'Traditional')  selected @endif >سنتی</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">تاریخ قرعه کشی</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input class="form-control" type="date" name="LotteryDate" value="{{$Lottery->LotteryDate}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">وضعیت</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="LotteryStatus">
                                            <option name="LotteryStatus" value="Published" @if($Lottery->LotteryStatus == 'Published') selected @endif >انتشار</option>
                                            <option name="LotteryStatus" value="Draft" @if($Lottery->LotteryStatus == 'Draft') selected @endif >پیش نویس</option>
                                            <option name="LotteryStatus" value="Archive" @if($Lottery->LotteryStatus == 'Archive') selected @endif >بایگانی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">بروزرسانی قرعه کشی</button>
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
