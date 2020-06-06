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
    @if(session('errors'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">وبلاگ</li>
            <li class="breadcrumb-item">ویرایش پست</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>پست را ویرایش کنید.</h4>
                            <h4>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Blog/EditPost/{{$Post->id}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('PostName') text-danger @enderror">عنوان</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text" class="form-control @error('PostName') border border-danger @enderror" name="PostName" value="{{$Post->PostName}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('PostContent') text-danger @enderror">محتوا</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="PostContent">
                                            {{$Post->PostContent}}
                                        </textarea>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('PostImage') text-danger @enderror">تصویر نوشته</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview text-danger">
                                            <label for="image-upload" id="image-label">انتخاب فایل</label>
                                            <input type="file" name="PostImage" id="image-upload">
                                        </div>
                                        <img src="{{$Post->PostImage}}" height="250" width="250">

                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">دسته بندی
                                        ها</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="PostTags">
                                            <option>انتخاب دسته بندی</option>
                                            @foreach($tags as $tag)
                                            <option name="PostTags" value="{{$tag->id}}" {{$PostTag[0]->tags_id == $tag->id ? 'selected' : ''}}>{{$tag->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">وضعیت</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="PostStatus">
                                            <option name="PostStatus" value="Published"{{$Post->PostStatus == 'Published' ? 'selected' : ''}}>انتشار</option>
                                            <option name="PostStatus" value="Draft" {{$Post->PostStatus == 'Draft' ? 'selected' : ''}}>پیش نویس</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">بروزرسانی پست</button>
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
