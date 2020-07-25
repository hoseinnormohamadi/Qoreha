@extends('Panel.Layuot')
@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                تماس با ما
            </li>
            <li class="breadcrumb-item">مدیریت تماس با ما</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link @if(request('Mode') == '') active @endif">همه <span
                                                class="badge badge-primary">{{$All}}</span></a>
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
                            <h4>تماس با ما</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="/panel/Ads/All">
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
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>شماره تماس</th>
                                        <th>ایمیل</th>
                                        <th>خلاصه متن</th>
                                        <th>ایجاد شده در</th>
                                    </tr>
                                    @foreach($Contacts as $Contact)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                           class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                {{$Contact->FirstName}}
                                            </td>
                                            <td>
                                                {{$Contact->LastName}}
                                            </td>
                                            <td>
                                                {{$Contact->PhoneNumber}}
                                            </td>
                                            <td>
                                                {{$Contact->Email}}
                                            </td>
                                            <td>
                                                {{Str::limit(strip_tags($Contact->Text),30) }}

                                                <div class="table-links">
                                                    <a href="/panel/Contact/Edit/{{$Contact->id}}">ویرایش</a>
                                                    <div class="bullet"></div>
                                                    <a href="/panel/Contact/Delete/{{$Contact->id}}" class="text-danger">
                                                        حذف
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                {{\Verta::instance($Contact->created_at)->format('Y/m/d')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {!! $Contacts->links() !!}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
