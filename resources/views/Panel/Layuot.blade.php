<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{\App\Site::SiteName()}}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets\css\app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets\css\style.css')}}">
    <link rel="stylesheet" href="{{asset('assets\css\components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets\css\custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='{{asset(\App\Site::SiteIcon())}}'>
    @yield('header')
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i
                                data-feather="align-justify"></i></a></li>
                    <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a></li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">

                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="تصویر"
                                                                                                         src="{{Auth::user()->ProfileImage}}"
                                                                                                         class="user-img-radious-style">
                        <span class="d-sm-none d-lg-inline-block"></span></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">{{Auth::user()->name}}</div>
                        <a href="/panel/User/Profile" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                            تنظیمات
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i
                                class="fas fa-sign-out-alt"></i>
                            خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="/panel"> <img alt="تصویر" src="{{asset(App\Site::SiteIcon())}}" class="header-logo"> <span
                            class="logo-name">{{App\Site::SiteName()}}</span>
                    </a>
                </div>
                <div class="sidebar-user">
                    <div class="sidebar-user-picture">
                        <img alt="تصویر" src="{{Auth::user()->ProfileImage}}">
                    </div>
                    <div class="sidebar-user-details">
                        <div class="user-name">{{\App\User::FullName()}}</div>
                        <div class="user-role">{{\App\User::GetRuleName()}}</div>
                    </div>
                </div>

                <ul class="sidebar-menu">
                    <li class="menu-header">اصلی</li>
                    <li class="dropdown {{(request()->segment(2) == '') ? 'active': ''}}">
                        <a href="/panel/" class="nav-link"><i class="fas fa-desktop"></i><span>داشبورد</span></a>
                    </li>
                    @if(config('Qoreha.BlogActivate') != false)
                        @if(Auth::user()->Rule == 'Admin'|| Auth::user()->Rule == 'Manager')
                            <li class="dropdown {{(request()->segment(2) == 'Blog') ? 'active': ''}}">
                                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-blog"></i><span>وبلاگ</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="/panel/Blog/AllPosts">مدیریت نوشته ها</a></li>
                                    <li><a class="nav-link" href="/panel/Blog/CreatePost">افزودن نوشته</a></li>
                                    <li><a class="nav-link" href="/panel/Blog/AllTags">مدیریت دسته بندی ها</a></li>
                                    <li><a class="nav-link" href="/panel/Blog/CreateTag">افزودن دسته بندی</a></li>
                                </ul>
                            </li>
                        @endif
                    @endif



                    @if(Auth::user()->Rule == 'Admin'|| Auth::user()->Rule == 'Manager'|| Auth::user()->Rule == 'LotteryOwner')
                        <li class="dropdown {{(request()->segment(2) == 'Lottery') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-gifts"></i><span>قرعه کشی ها</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Lottery/AllLottery">مدیریت قرعه کشی ها</a></li>
                                @if(Auth::user()->Rule == 'Admin'|| Auth::user()->Rule == 'Manager'|| Auth::user()->Rule == 'LotteryOwner')
                                    <li><a class="nav-link" href="/panel/Lottery/Create">افزودن قرعه کشی</a></li>
                                    @if(Auth::user()->Rule == 'Admin')
                                        <li><a class="nav-link" href="/panel/Lottery/Category/All">مدیریت دسته بندی
                                                ها</a></li>
                                        <li><a class="nav-link" href="/panel/Lottery/Category/Add">افزودن دسته بندی</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->Rule == 'Admin'|| Auth::user()->Rule == 'Manager')
                                        <li><a class="nav-link" href="/panel/Lottery/UncheckedLottery">قرعه کشی های
                                                تایید
                                                نشده</a></li>
                                    @endif
                                        @if(Auth::user()->Rule == 'Admin')
                                            <li><a class="nav-link" href="/panel/Lottery/DadeKavi">داده کاوی</a></li>
                                        @endif
                                    @endif
                            </ul>
                        </li>
                    @endif


                    <li class="dropdown {{(request()->segment(2) == 'WinWithOutLottery') ? 'active': ''}}">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                class="fa fa-ticket-alt"></i><span>بدون قرعه کشی برنده باش</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/panel/WinWithOutLottery/All">مدیریت</a></li>
                            <li><a class="nav-link" href="/panel/WinWithOutLottery/Add">افزودن</a></li>
                        </ul>
                    </li>


                    <li class="dropdown {{(request()->segment(2) == 'HomeLottery') ? 'active': ''}}">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                class="fa fa-gift"></i><span>قرعه کشی خانگی</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/panel/HomeLottery/All">مدیریت قرعه کشی ها</a></li>
                            <li><a class="nav-link" href="/panel/HomeLottery/Add">افزودن قرعه کشی</a></li>
                        </ul>
                    </li>

                    @if(Auth::user()->Rule == 'Admin')
                        <li class="dropdown {{(request()->segment(2) == 'Shop') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fa fa-shopping-basket"></i><span>فروشگاه</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Shop/All">مدیریت کالا ها</a></li>
                                <li><a class="nav-link" href="/panel/Shop/Add">افزودن کالا</a></li>
                                <li><a class="nav-link" href="/panel/Shop/Category/Add">افزودن دسته بندی</a></li>
                                <li><a class="nav-link" href="/panel/Shop/Category/All">مدیریت دسته بندی ها</a></li>

                            </ul>
                        </li>



                        <li class="dropdown {{(request()->segment(2) == 'Menu') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-sitemap"></i><span>منو سایت</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Menu/All">مدیریت منو ها</a></li>
                                <li><a class="nav-link" href="/panel/Menu/Add">افزودن منو</a></li>
                            </ul>
                        </li>





                        <li class="dropdown {{(request()->segment(2) == 'Slider') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fa fa-sliders-h"></i><span>اسلایدر</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Slider/All">مدیریت اسلایدر</a></li>
                                <li><a class="nav-link" href="/panel/Slider/Add">افزودن اسلایدر</a></li>

                            </ul>
                        </li>



                        <li class="dropdown {{(request()->segment(2) == 'Ads') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-ad"></i><span>تبلیغات</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Ads/All">مدیریت تبلیغات</a></li>
                                <li><a class="nav-link" href="/panel/Ads/Add">افزودن تبلیغ</a></li>
                            </ul>
                        </li>




                        <li class="dropdown {{(request()->segment(2) == 'CheckList') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-check-circle"></i><span>چک لیست نظارتی</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/CheckList/All">مدیریت چک لیست</a></li>
                                <li><a class="nav-link" href="/panel/CheckList/Add">افزودن چک لیست</a></li>
                            </ul>
                        </li>



                        <li class="dropdown {{(request()->segment(2) == 'LinkTrade') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-link"></i><span>تبادل لینک</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/LinkTrade/All">مدیریت لینک ها</a></li>
                                <li><a class="nav-link" href="/panel/LinkTrade/Add">افزودن لینک</a></li>
                            </ul>
                        </li>


                        <li class="dropdown {{(request()->segment(2) == 'Users') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-user"></i><span>کاربران</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Users/All">مدیریت کاربران</a></li>
                                <li><a class="nav-link" href="/panel/Users/Add">افزودن کاربر</a></li>
                                <li><a class="nav-link" href="/panel/Users/ManageRequest">درخواست های ارتقاء سطح
                                        دسترسی</a></li>
                            </ul>
                        </li>

                    @endif

                    @if(Auth::user()->Rule == 'Admin' || Auth::user()->Rule == 'Manager')
                        <li class="dropdown {{(request()->segment(2) == 'Contact') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-inbox"></i><span>پیام های کاربران</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Contact/All">مدیریت پیام ها</a></li>
                                <li><a class="nav-link" href="/panel/Contact/Add">افزودن پیام</a></li>
                            </ul>
                        </li>
                    @endif


                    <li class="dropdown {{(request()->segment(2) == 'User') ? 'active': ''}}">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                class="fas fa-user-circle"></i><span>حساب کاربری</span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->Rule == 'User' || Auth::user()->Rule == 'Supervisor')
                                <li><a class="nav-link" href="/panel/User/Upgrade/">ارتقاء سطح دسترسی</a></li>
                            @endif
                            <li><a class="nav-link" href="/panel/User/Profile">تنظیمات حساب کاربری</a></li>
                        </ul>
                    </li>


                    @if(Auth::user()->Rule == 'Admin')

                        <li class="dropdown {{(request()->segment(2) == 'Site') ? 'active': ''}}">
                            <a href="/panel/Site/Setting/" class="nav-link"><i
                                    class="fas fa-server"></i><span>تنظیمات سایت</span></a>
                        </li>

                    @endif

                </ul>
            </aside>
        </div>

        <!-- Main Content -->

        <div class="main-content">

            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">پیام سایت</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div
                            class="modal-body">


                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                    <br>
                                @endforeach

                            @elseif(session('errors'))
                                {{session('errors')->first('msg')}}
                            @endif


                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">متوجه شدم</button>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{asset('assets\js\app.min.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('assets\bundles\apexcharts\apexcharts.min.js')}}"></script>
<script src="{{asset('assets\bundles\amcharts4\core.js')}}"></script>
<script src="{{asset('assets\bundles\amcharts4\charts.js')}}"></script>
<script src="{{asset('assets\bundles\amcharts4\animated.js')}}"></script>
<script src="{{asset('assets\bundles\jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets\bundles\prism\prism.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets\js\page\index.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('assets\js\scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('assets\js\custom.js')}}"></script>

@if(session('errors'))
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#myModal').modal('show');
        });
    </script>
@endif

@yield('js')
</body>
</html>
