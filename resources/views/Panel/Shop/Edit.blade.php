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
            <li class="breadcrumb-item">فروشگاه</li>
            <li class="breadcrumb-item">ویرایش</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>کالا را ویرایش کنید</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Shop/Edit/{{$Item->id}}" enctype="multipart/form-data">
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
                                               name="Name" value="{{$Item->Name}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 @error('Description') text-danger @enderror">توضیحات</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea id="mytextarea" name="Description">{{$Item->Description}}</textarea>
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
                                        <img src="{{$Item->Image}}" width="250px" height="250px">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Color') text-danger @enderror">رنگ</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="color"
                                               class="form-control @error('Color') border border-danger @enderror"
                                               name="Color" value="{{$Item->Color}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Capacity') text-danger @enderror">ظرفیت</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Capacity') border border-danger @enderror"
                                               name="Capacity" value="{{$Item->Capacity}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Height') text-danger @enderror">ارتفاع</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Height') border border-danger @enderror"
                                               name="Height" value="{{$Item->Height}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Size') text-danger @enderror">عرض</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Size') border border-danger @enderror"
                                               name="Size" value="{{$Item->Size}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Weight') text-danger @enderror">وزن</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Weight') border border-danger @enderror"
                                               name="Weight" value="{{$Item->Weight}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Diameter') text-danger @enderror">قطر</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text"
                                               class="form-control @error('Diameter') border border-danger @enderror"
                                               name="Diameter" value="{{$Item->Diameter}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Price') text-danger @enderror">قیمت</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="number" min="1" step="1"
                                               class="form-control @error('Price') border border-danger @enderror"
                                               name="Price" value="{{$Item->Price}}">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">دسته بندی</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="Category">
                                            <option name="Category" disabled selected>دسته بندی را انتحاب کنید</option>
                                            @foreach($Tags as $Tag)
                                            <option name="Category" @if($Item->Category == $Tag->id) selected @endif value="{{$Tag->id}}">{{$Tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">وضعیت</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="Status">
                                            <option name="Status" disabled selected>وضعیت را انتحاب کنید</option>

                                            <option name="Status" @if($Item->Status == 'Available') selected @endif value="Available">موجود</option>
                                            <option name="Status" @if($Item->Status == 'UnAvailable') selected @endif value="UnAvailable">ناموجود</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">حالت</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="Type">
                                            <option name="Type" disabled selected>حالت را انتحاب کنید</option>
                                            <option name="Type" @if($Item->Type == 'Sell') selected @endif value="Sell">فروش</option>
                                            <option name="Type" @if($Item->Type == 'Rent') selected @endif value="Rent">اجاره</option>
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
