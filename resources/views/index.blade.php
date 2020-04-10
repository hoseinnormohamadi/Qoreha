@extends('Layuot')
@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
                <h4 class="page-title m-b-0">داشبورد</h4>
            </li>
            <li class="breadcrumb-item">
                <a href="index.php">
                    <i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item active">داشبورد</li>
        </ul>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">سفارشات دریافت شده است</h6>
                            <h4 class="text-right"><i class="fas fa-cart-plus pull-left bg-indigo c-icon"></i><span>7.12K</span>
                            </h4>
                            <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-green m-r-5"></i><span class="text-success font-weight-bold"></span>ماه قبل <span class="text-success font-weight-bold">23٪</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">کاربران ثبت نام شده</h6>
                            <h4 class="text-right"><i class="fas fa-users pull-left bg-cyan c-icon"></i><span>22.3K</span>
                            </h4>
                            <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-red m-r-5"></i><span class="col-red font-weight-bold">3٪</span> نسبت به ماه قبل</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">بلیط های پشتیبانی</h6>
                            <h4 class="text-right"><i class="fas fa-ticket-alt pull-left bg-deep-orange c-icon"></i><span>725</span>
                            </h4>
                            <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-green m-r-5"></i><span class="text-success font-weight-bold">21٪</span> نسبت به ماه قبل</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">کل درآمد</h6>
                            <h4 class="text-right"><i class="fas fa-dollar-sign pull-left bg-green c-icon"></i><span>300000 تومان</span>
                            </h4>
                            <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-down col-red m-r-5"></i><span class="col-red font-weight-bold">05٪</span> نسبت به ماه قبل</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>نمودار درآمد</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-inline text-center m-b-0">
                            <li class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                                <h5 class="m-b-0">675 تومان</h5>
                                <p class="text-muted font-14 m-b-0">درآمد هفتگی</p>
                            </li>
                            <li class="list-inline-item p-r-30"><i data-feather="arrow-down-circle" class="col-orange"></i>
                                <h5 class="m-b-0">1،587 تومان</h5>
                                <p class="text-muted font-14 m-b-0">درآمد ماهانه</p>
                            </li>
                            <li class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                                <h5 class="mb-0 m-b-0">45،965 تومان</h5>
                                <p class="text-muted font-14 m-b-0">درآمد سالانه</p>
                            </li>
                        </ul>
                        <div id="revenue"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-lg-4">
                <div class="card l-bg-purple">
                    <div class="card-body">
                        <div class="text-white">
                            <div class="row">
                                <div class="col-md-6 col-lg-5">
                                    <h4 class="mb-0 font-26 text-white">1235 تومان</h4>
                                    <p class="mb-2 text-white">میانگین فروش هر ماه</p>
                                    <p class="mb-0 text-white">
                                        <span class="font-20">+ 11.25٪</span> افزایش
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-7">
                                    <div class="sparkline-bar p-t-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card l-bg-cyan-dark">
                    <div class="card-body">
                        <div class="text-white">
                            <div class="row">
                                <div class="col-md-6 col-lg-5">
                                    <h4 class="mb-0 font-26 text-white">758</h4>
                                    <p class="mb-2 text-white">متوسط &#8203;&#8203;هزینه های جدید در هر ماه</p>
                                    <p class="mb-0 text-white">
                                        <span class="font-20">+ 25.11٪</span> افزایش
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-7">
                                    <div class="sparkline-inline p-t-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>فعالیت</h4>
                    </div>
                    <div class="card-body">
                        <div id="activity-scroll">
                            <ul class="activity-list">
                                <li> <i class="activity-icon bg-success"></i>
                                    <h6>سفارش قرار داده شده <small class="float-right text-muted">11 بهمن 1398</small></h6>
                                    <span class="font-12">شناسه سفارش: # 8547</span>
                                </li>
                                <li> <i class="activity-icon bg-info"></i>
                                    <h6>سفارش قبول <small class="float-right text-muted tx-11">11 بهمن 1398</small></h6> <span class="font-12">شناسه سفارش: # 8547</span>
                                </li>
                                <li> <i class="activity-icon bg-red"></i>
                                    <h6>آماده برای اعزام <small class="float-right text-muted tx-11">12 بهمن 1398</small></h6>
                                    <span class="font-12">شناسه سفارش: # 8547</span>
                                </li>
                                <li> <i class="activity-icon bg-primary"></i>
                                    <h6>سفارش ارسال شده <small class="float-right text-muted tx-11">14 بهمن 1398</small></h6>
                                    <span class="font-12">شناسه پیگیری: ED8597587</span>
                                </li>
                                <li> <i class="activity-icon bg-orange"></i>
                                    <h6>محصول تحویل <small class="float-right text-muted tx-11">16 بهمن 1398</small></h6>
                                    <span class="font-12">نام گیرنده: جان</span>
                                </li>
                                <li> <i class="activity-icon bg-green"></i>
                                    <h6>بازگشت محصول <small class="float-right text-muted tx-11">18 بهمن 1398</small></h6>
                                    <span class="font-12">نام گیرنده: سارا</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>نظرات</h4>
                    </div>
                    <div class="card-body">
                        <div id="support-scroll">
                            <ul class="list-unstyled ">
                                <li class="media border-bottom m-b-10 support-ticket">
                                    <img alt="تصویر" class="mr-3 user-img" width="40" src="\assets\img\users\user-5.png">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <i class="far fa-thumbs-up col-blue"></i>
                                            <i class="far fa-thumbs-down col-red"></i>
                                        </div>
                                        <div class="media-title mb-1">آلیس اسمیت</div>
                                        <div class="text-muted font-12">05 بهمن 1398</div>
                                        <div class="media-description">لورم ایپسوم متن ساختگی با تولید سادگی</div>
                                    </div>
                                </li>
                                <li class="media border-bottom m-b-10 support-ticket">
                                    <img alt="تصویر" class="mr-3 user-img" width="40" src="\assets\img\users\user-7.png">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <i class="far fa-thumbs-up col-blue"></i>
                                            <i class="far fa-thumbs-down col-red"></i>
                                        </div>
                                        <div class="media-title mb-1">پوجا سارما</div>
                                        <div class="text-muted font-12">05 بهمن 1398</div>
                                        <div class="media-description">لورم ایپسوم متن ساختگی با تولید سادگی</div>
                                    </div>
                                </li>
                                <li class="media border-bottom m-b-10 support-ticket">
                                    <img alt="تصویر" class="mr-3 user-img" width="40" src="\assets\img\users\user-1.png">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <i class="far fa-thumbs-up col-blue"></i>
                                            <i class="far fa-thumbs-down col-red"></i>
                                        </div>
                                        <div class="media-title mb-1">نام کاربر</div>
                                        <div class="text-muted font-12">05 بهمن 1398</div>
                                        <div class="media-description">لورم ایپسوم متن ساختگی با تولید سادگی</div>
                                    </div>
                                </li>
                                <li class="media border-bottom m-b-10 support-ticket">
                                    <img alt="تصویر" class="mr-3 user-img" width="40" src="\assets\img\users\user-8.png">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <i class="far fa-thumbs-up col-blue"></i>
                                            <i class="far fa-thumbs-down col-red"></i>
                                        </div>
                                        <div class="media-title mb-1">کارا استیونز</div>
                                        <div class="text-muted font-12">12 بهمن 1398</div>
                                        <div class="media-description">لورم ایپسوم متن ساختگی با تولید سادگی</div>
                                    </div>
                                </li>
                                <li class="media border-bottom m-b-10 support-ticket">
                                    <img alt="تصویر" class="mr-3 user-img" width="40" src="\assets\img\users\user-2.png">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <i class="far fa-thumbs-up col-blue"></i>
                                            <i class="far fa-thumbs-down col-red"></i>
                                        </div>
                                        <div class="media-title mb-1">پریا مهتا</div>
                                        <div class="text-muted font-12">19 مه 1398</div>
                                        <div class="media-description">لورم ایپسوم متن ساختگی با تولید سادگی</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>تیم پروژه</h4>
                    </div>
                    <div class="card-body">
                        <div class="media-list position-relative">
                            <div class="table-responsive" id="project-team-scroll">
                                <table class="table table-hover table-xl mb-0">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0">نام پروژه</th>
                                        <th class="border-top-0">کارمندان</th>
                                        <th class="border-top-0">هزینه</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-truncate">پروژه ی ایکس</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-8.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-9.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-10.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">8999 تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">پروژه AB2</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-1.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-3.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-2.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">1+</span></li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">5550 تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">پروژه DS3</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-5.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-9.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">9000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">پروژه XCD</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-8.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-3.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-5.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span></li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">7500 تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">پروژه Z2</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-8.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-10.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">8500 تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">پروژه GTe</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-3.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-5.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">8500 تومان</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>چارت سازمانی</h4>
                    </div>
                    <div class="card-body">
                        <div id="amchart1" class="amChartHeight ltr"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>چارت سازمانی</h4>
                    </div>
                    <div class="card-body">
                        <div id="amchart2" class="amChartHeight ltr"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>لیست پروژه ها را اختصاص دهید</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="جستجو">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>حضانت</th>
                                    <th>پروژه</th>
                                    <th>تاریخ را اختصاص دهید</th>
                                    <th>تیم</th>
                                    <th>اولویت</th>
                                    <th>وضعیت</th>
                                    <th>ویرایش کنید</th>
                                </tr>
                                </thead>
                                <tbody><tr>
                                    <td class="table-img"><img src="\assets\img\users\user-8.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13">وب سایت وردپرس</h6>
                                        <p class="m-0 font-12">
                                            اختصاص داده شده به <span class="col-green font-weight-bold">ایری ساتو</span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-8.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-9.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-10.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-red">بالا</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">50٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar bg-success" data-width="50%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-img"><img src="\assets\img\users\user-1.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13">برنامه بازی Android</h6>
                                        <p class="m-0 font-12">
                                            اختصاص به <span class="col-green font-weight-bold">سارا اسمیت</span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-4.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-7.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-2.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-green">کم</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">55٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar bg-purple" data-width="55%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-img"><img src="\assets\img\users\user-5.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13">سرویس وب جاوا</h6>
                                        <p class="m-0 font-12">
                                            به <span class="col-green font-weight-bold">کارا استیونز اختصاص یافت</span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-3.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-7.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-8.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-blue">متوسط</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">70٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar" data-width="70%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-img"><img src="\assets\img\users\user-9.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13">برنامه IOS </h6>
                                        <p class="m-0 font-12">
                                            به <span class="col-green font-weight-bold">جان دوو</span> واگذار شد<span class="col-green font-weight-bold"></span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-2.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-10.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-4.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-red">بالا</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">45٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar bg-cyan" data-width="45%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-img"><img src="\assets\img\users\user-10.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13">قالب مدیر را آماده کنید</h6>
                                        <p class="m-0 font-12">
                                            به <span class="col-green font-weight-bold">اشتون کاکس</span> واگذار شد<span class="col-green font-weight-bold"></span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-1.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-5.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-7.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-blue">متوسط</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">67٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar bg-red" data-width="67%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-img"><img src="\assets\img\users\user-4.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13"> لورم ایپسوم متن ساختگی </h6>
                                        <p class="m-0 font-12">
                                            اختصاص به <span class="col-green font-weight-bold">سارا اسمیت</span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-5.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-8.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-3.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-green">کم</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">41٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar bg-orange" data-width="41%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-img"><img src="\assets\img\users\user-10.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13">بهبود سئو</h6>
                                        <p class="m-0 font-12">
                                            به <span class="col-green font-weight-bold">جاناک گاندی اختصاص یافت</span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-3.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-9.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-1.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-red">بالا</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">70٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar bg-success" data-width="70%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-img"><img src="\assets\img\users\user-6.png" alt="">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 font-13">وب سایت Laravel</h6>
                                        <p class="m-0 font-12">
                                            اختصاص داده شده به <span class="col-green font-weight-bold">Mili Rain</span>
                                        </p>
                                    </td>
                                    <td>1398/11/15</td>
                                    <td class="text-truncate">
                                        <ul class="list-unstyled order-list m-b-0 m-b-0">
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-4.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-7.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                            <li class="team-member team-member-sm"><img class="rounded-circle" src="\assets\img\users\user-2.png" alt="کاربر" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="badge-outline col-green">کم</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-text">55٪</div>
                                        <div class="progress" data-height="6">
                                            <div class="progress-bar bg-purple" data-width="55%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" title="" data-original-title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" title="" data-original-title="حذف"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
