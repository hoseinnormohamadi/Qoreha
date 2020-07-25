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
            <li class="breadcrumb-item">تماس با ما</li>
            <li class="breadcrumb-item">افزودن پیام</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>پیام جدیدی ایجاد کنید.</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Contact/Add">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('FirstName') text-danger @enderror">
                                        نام
                                    </label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('FirstName') border border-danger @enderror"
                                               name="FirstName" value="{{old('FirstName')}}">
                                    </div>
                                </div>




                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('LastName') text-danger @enderror">
                                        نام خانوادگی
                                    </label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('LastName') border border-danger @enderror"
                                               name="LastName" value="{{old('LastName')}}">
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
                                               name="PhoneNumber" value="{{old('PhoneNumber')}}">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Email') text-danger @enderror">
                                        ایمیل
                                    </label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="email"
                                               class="form-control @error('Email') border border-danger @enderror"
                                               name="Email" value="{{old('Email')}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Text') text-danger @enderror">پیام</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="Text">{{old('Text')}}</textarea>
                                    </div>
                                </div>






                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">ایجاد پیام</button>
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
