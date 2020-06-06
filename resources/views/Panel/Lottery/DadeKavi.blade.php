@extends('Panel.Layuot')

@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">

            <li class="breadcrumb-item">
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">قرعه کشی ها</li>
            <li class="breadcrumb-item">داده کاوی</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>داده کاوی کنید.</h4>
                            <h4>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/panel/Lottery/DadeKaviPost">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Text') text-danger @enderror">هشتگ یا ایدی کاربر</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="text" class="form-control @error('Text') border border-danger @enderror" name="Text">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3  @error('Tedad') text-danger @enderror">تعداد</label>
                                    <div class="col-sm-12 col-md-7 ">
                                        <input type="number" class="form-control @error('Tedad') border border-danger @enderror" name="Tedad">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">شروع داده کاوی</button>
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


