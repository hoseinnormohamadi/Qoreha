@extends('Panel.Layuot')
@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                اسلایدر
            </li>
            <li class="breadcrumb-item">مدیریت اسلایدر ها</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link @if(request('Mode') == '') active @endif" href="?Mode=">همه <span
                                                class="badge badge-primary">{{$All}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(request('Mode') == 'Active') active @endif" href="?Mode=Active">فعال <span
                                                class="badge badge-primary">{{$Active}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(request('Mode') == 'DeActive') active @endif" href="?Mode=DeActive">غیرفعال <span
                                                class="badge badge-primary">{{$DeActive}}</span></a>
                                    </li>

                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>اسلایدر</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="/panel/Slider/All">
                                    <div class="input-group">
                                        <input type="text" name="SearchTerm"
                                               value="{{isset($_GET['SearchTerm'])  ? $_GET['SearchTerm'] : ''}}"
                                               class="form-control" placeholder="جستجو">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th class="pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                       data-checkbox-role="dad" class="custom-control-input"
                                                       id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>عکس</th>
                                        <th>نام</th>
                                        <th>توضیحات</th>
                                        <th>وضعیت</th>
                                        <th>ایجاد شده در</th>
                                    </tr>
                                    @foreach($Sliders as $Slider)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                           class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="تصویر" src="{{$Slider->Image}}"
                                                         class="rounded-circle" width="35" data-toggle="title" title="">
                                                </a>
                                            </td>
                                            <td>
                                                {{$Slider->Name}}
                                            </td>
                                            <td>
                                                {{Str::limit(strip_tags($Slider->Text),30) }}

                                                <div class="table-links">
                                                    <a href="/panel/Slider/Edit/{{$Slider->id}}">ویرایش</a>
                                                    <div class="bullet"></div>
                                                    <a href="/panel/Slider/Delete/{{$Slider->id}}" class="text-danger">
                                                        حذف
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                @if($Slider->Status == 'Active')
                                                    <div class="badge badge-primary">فعال</div>
                                                @elseif($Slider->Status == 'DeActive')
                                                    <div class="badge badge-danger">غیرفعال</div>
                                                @endif
                                            </td>

                                            <td>
                                                {{\Verta::instance($Slider->created_at)->format('Y/m/d')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {!! $Sliders->links() !!}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
