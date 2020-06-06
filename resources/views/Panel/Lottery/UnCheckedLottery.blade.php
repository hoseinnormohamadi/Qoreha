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
            <li class="breadcrumb-item">قرعه کشی های تایید نشده</li>
        </ul>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            @if(Auth::user()->Rule == 'Admin')
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="?Mode=">همه <span
                                                class="badge badge-primary">{{$All}}</span></a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link text-info" href="?Mode=Published">منتشر شده<span
                                                class="badge badge-info">{{$Published}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="?Mode=Draft">پیش نویس <span
                                                class="badge badge-danger">{{$Draft}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="?Mode=Waiting">در انتظار <span
                                                class="badge badge-danger">{{$Waiting}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="?Mode=Archive">آرشیو <span
                                                class="badge badge-danger">{{$Archive}}</span></a>
                                    </li>

                                </ul>
                            @endif

                            @if(Auth::user()->Rule == 'Manager')
                                <ul class="nav nav-pills">
                                    <li class="nav-ite">
                                        <a class="nav-link" href="?">قرعه های شما <span
                                                class="badge badge-primary">{{$All}}</span></a>
                                    </li>
                                    @if($All == 0 )
                                        <li class="nav-item">
                                            <a class="nav-link active" href="?GetLottery=true">دریافت قرعه کشی</a>
                                        </li>
                                    @endif

                                </ul>
                                @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>همه قرعه کشی های تایید نشده</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="/panel/Lottery/UncheckedLottery">
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
                                        @if(Auth::user()->Rule == 'Admin')
                                        <th>مسئول</th>
                                        @endif
                                        <th>محتوا</th>
                                        <th>ایجاد شده در</th>
                                        {{--<th>ارسال کننده</th>--}}
                                        <th>وضعیت</th>
                                    </tr>
                                    @foreach($Lotterys as $Lottery)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                           class="custom-control-input" id="checkbox-{{$Lottery->id}}">
                                                    <label for="checkbox-{{$Lottery->id}}" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            @if(Auth::user()->Rule == 'Admin')

                                            <td>

                                                <img alt="تصویر" src="{{$Lottery->User->ProfileImage}}"
                                                     class="rounded-circle" width="35" data-toggle="title" title="">
                                                <span class="d-inline-block ml-1">{{$Lottery->User->Username}}</span>

                                            </td>
                                            @endif
                                            <td>{{Str::limit($Lottery->LotteryContent,100) }}
                                                <div class="table-links">

                                                    <a href="/panel/Lottery/ImportLottery/{{$Lottery->id}}">بررسی
                                                        کنید</a>
                                                </div>
                                            </td>


                                            <td>
                                                {{\Verta::instance($Lottery->created_at)->format('Y-m-d')}}
                                            </td>

{{--
                                            <td>
                                                @if($Lottery->Sender == 'Bot')
                                                    <div class="badge badge-primary">ربات</div>
                                                @elseif($Lottery->Sender == 'User')
                                                    <div class="badge badge-primary">Must Show User Name</div>
                                                @endif
                                            </td>--}}

                                            <td>
                                                @if($Lottery->LotteryStatus == 'Published')
                                                    <div class="badge badge-primary">منتشر شده</div>
                                                @elseif($Lottery->LotteryStatus == 'Draft')
                                                    <div class="badge badge-danger">حذف شده</div>
                                                @elseif($Lottery->LotteryStatus == 'Waiting')
                                                    <div class="badge badge-info">در انتظار بررسی</div>
                                                @endif
                                            </td>

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
