@extends('Panel.Layuot')
@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
                <a href="/panel/">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                کاربران
            </li>
            <li class="breadcrumb-item">مدیریت کاربران</li>
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
                                    <li class="nav-item ">
                                        <a class="nav-link text-info @if(request('Mode') == 'Admin') active @endif" href="?Mode=Admin">مدیران<span
                                                class="badge badge-primary">{{$Admin}}</span></a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link text-info @if(request('Mode') == 'Manager') active @endif" href="?Mode=Manager">اوپراتور ها<span
                                                class="badge badge-info">{{$Manager}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger @if(request('Mode') == 'LotteryOwner') active @endif" href="?Mode=LotteryOwner">صاحبان قرعه کشی<span
                                                class="badge badge-warning">{{$LotteryOwner}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger @if(request('Mode') == 'Supervisor') active @endif" href="?Mode=Supervisor">ناظران <span
                                                class="badge badge-danger">{{$Supervisor}}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger @if(request('Mode') == 'User') active @endif" href="?Mode=User">کاربران عادی <span
                                                class="badge badge-dark">{{$NormalUser}}</span></a>
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
                            <h4>کاربران</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="/panel/Users/All">
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
                                        <th>عکس کاربر</th>
                                        <th>نام کاربری</th>
                                        <th>نام کامل</th>
                                        <th>شماره همراه</th>
                                        <th>عضو شده در</th>
                                        <th>سطح دسترسی</th>
                                    </tr>
                                    @foreach($Users as $User)
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
                                                    <img alt="تصویر" src="{{$User->ProfileImage}}"
                                                         class="rounded-circle" width="35" data-toggle="title" title="">
                                                </a>
                                            </td>
                                            <td>
                                                {{$User->Username}}
                                            </td>
                                            <td>{{$User->FirstName . ' ' . $User->LastName}}
                                                <div class="table-links">
                                                    <a href="/panel/Users/ShowProfile/{{$User->id}}">مشاهده پروفایل</a>
                                                    <div class="bullet"></div>
                                                    <a href="/panel/Users/Edit/{{$User->id}}">ویرایش کنید</a>
                                                    <div class="bullet"></div>
                                                    <a href="/panel/Users/Delete/{{$User->id}}" class="text-danger">
                                                        حذف کاربر
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                {{$User->PhoneNumber}}
                                            </td>
                                            <td>{{\Verta::instance($User->created_at)->format('Y/m/d')}}</td>
                                            <td>
                                                <div class="badge  @if($User->Rule == 'Admin') badge-primary @elseif($User->Rule == 'Manager') badge-info @elseif($User->Rule == 'LotteryOwner') badge-warning @elseif($User->Rule == 'Supervisor') badge-danger @elseif($User->Rule == 'User') badge-dark @endif">{{\App\User::GetRuleNameByRule($User->Rule)}}</div>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {!! $Users->links() !!}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
