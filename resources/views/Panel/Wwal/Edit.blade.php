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
            <li class="breadcrumb-item">بدون قرعه کشی برنده باش</li>
            <li class="breadcrumb-item">ویرایش</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>قرعه کشی را ویرایش کنید.</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/WinWithOutLottery/Edit/{{$Wwal->id}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Name') text-danger @enderror">
                                        نام
                                    </label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Name') border border-danger @enderror"
                                               name="Name" value="{{$Wwal->Name}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Content') text-danger @enderror">محتوا</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="Content">{{$Wwal->Content}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Image') text-danger @enderror">تصویر</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview text-danger">
                                            <label for="image-upload" id="image-label">انتخاب فایل</label>
                                            <input type="file" name="Image" id="image-upload">
                                        </div>
                                        <img src="{{$Wwal->Image}}" height="250px" width="250px">
                                    </div>
                                </div>





                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('ExpireDate') text-danger @enderror">تاریخ انقضا</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="date"
                                               class="form-control @error('ExpireDate') border border-danger @enderror"
                                               name="ExpireDate" value="{{$Wwal->ExpireDate}}" required>
                                    </div>
                                </div>





                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">دسته بندی
                                        ها</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="Category">
                                            <option>انتخاب دسته بندی</option>
                                            @foreach($Tags as $tag)
                                                <option name="Category" value="{{$tag->id}}" @if($tag->id == $Wwal->Category) selected @endif >{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>






                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">زیر دسته بندی
                                        ها</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="SubCategory">
                                            <option>انتخاب زیر دسته بندی</option>
                                            @foreach($SubCategory as $tag)
                                                <option name="SubCategory" value="{{$tag->id}}" @if($tag->id == $Wwal->SubCategory) selected @endif >{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">بروزرسانی</button>
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
