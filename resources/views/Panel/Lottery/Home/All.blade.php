@extends('Panel.Layuot')
@section('content')
    @if(session('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            <li class="breadcrumb-item">
قرعه کشی ها
            </li>
            <li class="breadcrumb-item"> قرعه کشی های خانگی</li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="?Mode=">همه <span
                                                class="badge badge-primary">{{$Published+$Draft}}</span></a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link text-info" href="?Mode=inWay">در جریان <span
                                                class="badge badge-info">{{$inWay}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="?Mode=finished">پایان یافته <span
                                                class="badge badge-danger">{{$finished}}</span></a>
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
                            <h4>همه قرعه کشی های خانگی</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="/panel/Lottery/Home/All">
                                    <div class="input-group">
                                        <input type="text" name="SearchTerm" class="form-control" placeholder="جستجو">
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
                                        <th>ایجاد کننده</th>
                                        <th>اعضا</th>
                                        <th>مقدار قرعه کشی</th>
                                        <th>ایجاد شده در</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    @foreach($Lotterys as $Lottery)
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
                                                <img alt="تصویر" src="{{$Lottery->User->ProfileImage}}"
                                                     class="rounded-circle" width="35" data-toggle="title" title="">
                                                </a>
                                            </td>
                                            <td>{{$Lottery->Afrad}}
                                                <div class="table-links">
                                                    <a href="#">مشاهده</a>
                                                    <div class="bullet"></div>
                                                    <a href="/panel/Lottery/Home/Edit/{{$Post->id}}">ویرایش کنید</a>
                                                    <div class="bullet"></div>
                                                    <a href="/panel/Lottery/Home/Delete/{{$Post->id}}" class="text-danger">زباله
                                                        ها</a>
                                                </div>
                                            </td>
                                            <td>
                                                {{$Lottery->KollPoll}}
                                            </td>
                                            <td>{{\Verta::instance($Post->created_at)->format('Y-m-d')}}</td>
                                            @if($Post->Status == 'finished')
                                                <td>
                                                    <div class="badge badge-danger">پایان یافته</div>
                                                </td>

                                            @elseif($Post->Status == 'inWay')
                                                <td>
                                                    <div class="badge badge-primary">در حال اجرا</div>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {!! $Lotterys->links() !!}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
