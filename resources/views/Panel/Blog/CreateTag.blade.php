@extends('Panel.Layuot')
@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">

            <li class="breadcrumb-item">
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">وبلاگ</li>
            <li class="breadcrumb-item">ایجاد دسته بندی</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>دسته بندی جدیدی را ایجاد کنید.</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Blog/CreateTag">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('TagName') text-danger @enderror">نام دسته بندی</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text" class="form-control @error('TagName') border border-danger @enderror" name="TagName">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">ایجاد دسته بندی</button>
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
