<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>داشبورد</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="\assets\css\app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="\assets\css\style.css">
    <link rel="stylesheet" href="\assets\css\components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="\assets\css\custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='\assets\img\favicon.ico'>
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
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="جستجو"
                                           aria-label="جستجو کردن"
                                           data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                                 class="nav-link nav-link-lg message-toggle"><i
                                data-feather="mail"></i>
                            <span class="badge headerBadge1">
                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                پیام ها
                                <div class="float-right">
                                    <a href="#">نامه های خوانده شده</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
                    text-white"> <img alt="image" src="\assets\img\users\user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">نام کاربر </span>
                    <span class="time messege-text">لطفا ایمیل خود زا چک کنید.</span>
                    <span class="time">2 دقیقه قبل</span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="\assets\img\users\user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">سارا </span> <span
                                            class="time messege-text"> متن ساختگی </span>
                    <span class="time">5 دقیقه قبل </span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="\assets\img\users\user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">نام کاربر </span> <span
                                            class="time messege-text">
                      لورم متن ساختگی
                    </span> <span class="time">30 دقیقه قبل </span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
            text-white"> <img alt="image" src="\assets\img\users\user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">نام کاربر </span>
                    <span class="time messege-text">لطفا ایمیل خود زا چک کنید.</span>
                    <span class="time">2 دقیقه قبل</span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="\assets\img\users\user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">سارا </span> <span
                                            class="time messege-text"> متن ساختگی </span>
                    <span class="time">5 دقیقه قبل </span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="\assets\img\users\user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">نام کاربر </span> <span
                                            class="time messege-text">
                      لورم متن ساختگی
                    </span> <span class="time">30 دقیقه قبل </span>
                  </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">مشاهده همه <i class="fas fa-chevron-left"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                                 class="nav-link notification-toggle nav-link-lg"><i
                                data-feather="bell" class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                اطلاعیه
                                <div class="float-right">
                                    <a href="#">نامه های خوانده شده</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                                        class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc">به روز رسانی الگو اکنون در دسترس است! <span class="time">2 دقیقه پیش</span>
                  </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i
                                            class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>شما</b> و <b>سارا</b> اکنون <span class="time">10 ساعت قبل </span><b>باهم دوست</b> هستید<span
                                            class="time"></span>
                  </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-success text-white"> <i class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>امیر</b> وظیفه <b>رفع خط هدر را</b> به <b>موفقیت انجام داد</b> <span
                                            class="time">12 ساعت قبل </span>
                  </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-danger text-white"> <i
                                            class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc">کمبود فضای دیسک. بیایید آن را تمیز کنیم! <span class="time">17 ساعت قبل</span>
                  </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i
                                            class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc">به الگوی داشبورد خوش آمدید! <span class="time">دیروز</span>
                  </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">مشاهده همه <i class="fas fa-chevron-left"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="تصویر"
                                                                                                             src="\assets\img\user.png"
                                                                                                             class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{Auth::user()->name}}</div>
                            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> مشخصات
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                فعالیت ها
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                تنظیمات
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i
                                    class="fas fa-sign-out-alt" ></i>
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
                        <a href="index.php"> <img alt="تصویر" src="\assets\img\logo.png" class="header-logo"> <span
                                class="logo-name">زیوی</span>
                        </a>
                    </div>
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img alt="تصویر" src="\assets\img\user.png">
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name">{{Auth::user()->name}}</div>
                            <div class="user-role">{{Auth::user()->roles[0]->name}}</div>
                        </div>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="menu-header">اصلی</li>
                        @role('admin|manager|lotteryadmin|user')
                        <li class="dropdown {{(request()->segment(2) == '') ? 'active': ''}}">
                            <a href="/panel/" class="nav-link"><i class="fas fa-desktop"></i><span>داشبورد</span></a>
                        </li>
                        @endrole
                        @if(config('Qoreha.BlogActivate') != false)
                        @role('admin|manager')
                        <li class="dropdown {{(request()->segment(2) == 'Blog') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-blog"></i><span>وبلاگ</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Blog/AllPosts">مدیریت نوشته ها</a></li>
                                <li><a class="nav-link" href="/panel/Blog/CreatePost">افزودن نوشته</a></li>
                                <li><a class="nav-link" href="/panel/Blog/AllTags">مدیریت دسته بندی ها</a></li>
                                <li><a class="nav-link" href="/panel/Blog/CreateTag">افزودن دسته بندی</a></li>
                            </ul>
                        </li>
                        @endrole
                        @endif



                        @role('admin|manager|lotteryadmin')
                        <li class="dropdown {{(request()->segment(2) == 'Lottery') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-gifts"></i><span>قرعه کشی ها</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/Lottery/AllLottery">مدیریت قرعه کشی ها</a></li>
                                @role('admin|manager')
                                <li><a class="nav-link" href="/panel/Lottery/Create">افزودن قرعه کشی</a></li>
                                <li><a class="nav-link" href="/panel/Lottery/UncheckedLottery">قرعه کشی های تایید نشده</a></li>
                                @endrole
                            </ul>
                        </li>
                        @endrole
                        @role('admin')
                        <li class="dropdown {{(request()->segment(2) == 'users') ? 'active': ''}}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                   class="fas fa-user"></i><span>کاربران</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/panel/users/show">مدیریت کاربران</a></li>
                                <li><a class="nav-link" href="/panel/users/add">افزودن کاربر</a></li>
                            </ul>
                        </li>
                        <li class="dropdown {{(request()->segment(2) == 'SiteSetting') ? 'active': ''}}">
                            <a href="/panel/SiteSetting/" class="nav-link"><i class="fas fa-server"></i><span>تنظیمات سایت</span></a>
                        </li>

                        @endrole
                        @role('admin|manager|lotteryadmin|user')
                        <li class="dropdown {{(request()->segment(2) == 'UserSetting') ? 'active': ''}}">
                            <a href="/panel/UserSetting/" class="nav-link"><i class="fas fa-user-circle"></i><span>تنظیمات حساب کاربری</span></a>
                        </li>
                        @endrole

                    </ul>
                </aside>
            </div>

        <!-- Main Content -->

        <div class="main-content">
            @yield('content')
            <?php /*require_once 'Template/footer.php'*/?>
        </div>
    </div>
</div>

    <!-- General JS Scripts -->
    <script src="\assets\js\app.min.js"></script>
    <!-- JS Libraies -->
    <script src="\assets\bundles\apexcharts\apexcharts.min.js"></script>
    <script src="\assets\bundles\amcharts4\core.js"></script>
    <script src="\assets\bundles\amcharts4\charts.js"></script>
    <script src="\assets\bundles\amcharts4\animated.js"></script>
    <script src="\assets\bundles\jquery.sparkline.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="\assets\js\page\index.js"></script>
    <!-- Template JS File -->
    <script src="\assets\js\scripts.js"></script>
    <!-- Custom JS File -->
    <script src="\assets\js\custom.js"></script>
@yield('js')
</body>
</html>
