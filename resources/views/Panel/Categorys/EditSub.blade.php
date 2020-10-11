@extends('Panel.Layuot')

@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">

            <li class="breadcrumb-item">
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">قرعه کشی ها</li>
            <li class="breadcrumb-item">ویرایش زیر دسته بندی</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>زیر دسته بندی  را ویرایش کنید.</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('SubCategory.Update' , $SubCategory->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Name') text-danger @enderror">نام دسته بندی</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text" class="form-control @error('Name') border border-danger @enderror" name="Name" value="{{$SubCategory->name}}">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">دسته بندی مادر</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="Parent">
                                            <option>انتخاب دسته بندی</option>
                                            @foreach($Tags as $tag)
                                                <option name="Parent" value="{{$tag->id}}" @if($tag->id == $SubCategory->Parent) selected @endif >{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Image') text-danger @enderror">تصویر</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="file" class="form-control @error('Image') border border-danger @enderror" name="Image" value="{{$SubCategory->Image}}">
                                    </div>
                                </div>

                                <div class="form-group  row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">بروزرسانی زیر دسته بندی</button>
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

@section('js')
    <script>
        $('.my').iconpicker();
    </script>
@endsection
