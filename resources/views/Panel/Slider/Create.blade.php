@extends('Panel.Layuot')
@section('header')
    <script src="{{asset('assets/Plugin/tinymce/tinymce.min.js')}}"></script>
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
            <li class="breadcrumb-item">اسلایدر</li>
            <li class="breadcrumb-item">افزودن اسلایدر</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>اسلایدر جدیدی ایجاد کنید.</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Slider/Add" enctype="multipart/form-data">
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
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Text') text-danger @enderror">توضیحات</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="Text">{{old('Text')}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('SliderImage') text-danger @enderror">تصویر اسلایدر</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview text-danger">
                                            <label for="image-upload" id="image-label">انتخاب فایل</label>
                                            <input type="file" name="SliderImage" id="image-upload">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Status') text-danger @enderror">
                                        وضعیت
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <select
                                            class="form-control selectric @error('Status') border border-danger @enderror"
                                            name="Status" required>
                                            <option name="Status" value="Active">فعال</option>
                                            <option name="Status" value="DeActive">غیر فعال</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">ایجاد اسلایدر</button>
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
