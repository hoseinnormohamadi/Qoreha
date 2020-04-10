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
                    text-white"> <img alt="image" src="assets\img\users\user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">نام کاربر </span>
                    <span class="time messege-text">لطفا ایمیل خود زا چک کنید.</span>
                    <span class="time">2 دقیقه قبل</span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets\img\users\user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">سارا </span> <span
                                            class="time messege-text"> متن ساختگی </span>
                    <span class="time">5 دقیقه قبل </span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets\img\users\user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">نام کاربر </span> <span
                                            class="time messege-text">
                      لورم متن ساختگی
                    </span> <span class="time">30 دقیقه قبل </span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
            text-white"> <img alt="image" src="assets\img\users\user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">نام کاربر </span>
                    <span class="time messege-text">لطفا ایمیل خود زا چک کنید.</span>
                    <span class="time">2 دقیقه قبل</span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets\img\users\user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">سارا </span> <span
                                            class="time messege-text"> متن ساختگی </span>
                    <span class="time">5 دقیقه قبل </span>
                  </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets\img\users\user-4.png" class="rounded-circle">
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
                                                                                                             src="assets\img\user.png"
                                                                                                             class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">سلام سارا اسمیت</div>
                            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> مشخصات
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                فعالیت ها
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                تنظیمات
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                خروج
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.php"> <img alt="تصویر" src="assets\img\logo.png" class="header-logo"> <span
                                class="logo-name">زیوی</span>
                        </a>
                    </div>
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img alt="تصویر" src="assets\img\user.png">
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name">سارا اسمیت</div>
                            <div class="user-role">مدیر</div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">اصلی</li>


                        <li class="dropdown active">
                            {{-- Check User have Premission--}}
                            @role('admin')
                            <a href="test.php"> All users </a>
                            @endrole
                            <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>داشبورد</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>ابزارک ها</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="widget-chart.html">ابزارکهای نمودار</a></li>
                                <li><a class="nav-link" href="widget-data.html">ابزارکهای داده</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>برنامه ها</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chat.html">گپ</a></li>
                                <li><a class="nav-link" href="portfolio.html">نمونه کارها</a></li>
                                <li><a class="nav-link" href="blog.html">وبلاگ</a></li>
                                <li><a class="nav-link" href="calendar.html">تقویم</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="mail"></i><span>ایمیل</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="email-inbox.html">صندوق ورودی</a></li>
                                <li><a class="nav-link" href="email-compose.html">ساختن</a></li>
                                <li><a class="nav-link" href="email-read.html">خواندن</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">عناصر UI</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>اجزای اساسی</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="alert.html">هشدار</a></li>
                                <li><a class="nav-link" href="badge.html">نشان</a></li>
                                <li><a class="nav-link" href="breadcrumb.html">متن های لینک دار</a></li>
                                <li><a class="nav-link" href="buttons.html">دکمه ها</a></li>
                                <li><a class="nav-link" href="collapse.html">سقوط - فروپاشی</a></li>
                                <li><a class="nav-link" href="dropdown.html">رها کردن</a></li>
                                <li><a class="nav-link" href="checkbox-and-radio.html">دکمه های رادیویی</a></li>
                                <li><a class="nav-link" href="list-group.html">گروه لیست</a></li>
                                <li><a class="nav-link" href="media-object.html"> رسانه ها</a></li>
                                <li><a class="nav-link" href="navbar.html">منو ها</a></li>
                                <li><a class="nav-link" href="pagination.html">صفحه بندی</a></li>
                                <li><a class="nav-link" href="popover.html">پاپ آپ</a></li>
                                <li><a class="nav-link" href="progress.html">نوارهای پیشرفت</a></li>
                                <li><a class="nav-link" href="tooltip.html">راهنمای ابزار</a></li>
                                <li><a class="nav-link" href="flags.html">پرچم</a></li>
                                <li><a class="nav-link" href="typography.html">تایپوگرافی</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="shopping-bag"></i><span>پیشرفته</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="avatar.html">آواتار</a></li>
                                <li><a class="nav-link" href="card.html">کارت</a></li>
                                <li><a class="nav-link" href="modal.html">مودال</a></li>
                                <li><a class="nav-link" href="sweet-alert.html">پنجره های زیبا</a></li>
                                <li><a class="nav-link" href="toastr.html">پیغام ها</a></li>
                                <li><a class="nav-link" href="empty-state.html">حالت خالی</a></li>
                                <li><a class="nav-link" href="multiple-upload.html">بارگذاری چندگانه</a></li>
                                <li><a class="nav-link" href="pricing.html">قیمت گذاری</a></li>
                                <li><a class="nav-link" href="tabs.html">برگه</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>صفحه خالی</span></a>
                        </li>
                        <li class="menu-header">فرم</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="layout"></i><span>فرم ها</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-form.html">فرم اصلی</a></li>
                                <li><a class="nav-link" href="forms-advanced-form.html">فرم پیشرفته</a></li>
                                <li><a class="nav-link" href="forms-editor.html">ویرایشگر</a></li>
                                <li><a class="nav-link" href="forms-validation.html">اعتبار سنجی</a></li>
                                <li><a class="nav-link" href="form-wizard.html">فرم جادویی</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="grid"></i><span>جداول</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-table.html">جداول اساسی</a></li>
                                <li><a class="nav-link" href="advance-table.php">نمونه جداول</a></li>
                                <li><a class="nav-link" href="datatables.html">جدول داده</a></li>
                                <li><a class="nav-link" href="export-table.html">جدول صادرات</a></li>
                                <li><a class="nav-link" href="editable-table.html">جدول قابل ویرایش</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="pie-chart"></i><span>نمودار</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chart-amchart.html">نمودار AM</a></li>
                                <li><a class="nav-link" href="chart-apexchart.html">نمودار</a></li>
                                <li><a class="nav-link" href="chart-echart.html">نمودار چارت</a></li>
                                <li><a class="nav-link" href="chart-chartjs.html">چارتیس</a></li>

                                <li><a class="nav-link" href="chart-morris.html">موریس</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="feather"></i><span>آیکون</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="icon-font-awesome.html"> آیکون Awesome</a></li>
                                <li><a class="nav-link" href="icon-material.html">آیکون متریال</a></li>
                                <li><a class="nav-link" href="icon-ionicons.html">آیکون های یون</a></li>
                                <li><a class="nav-link" href="icon-feather.html">آیکون فیچر</a></li>
                                <li><a class="nav-link" href="icon-weather-icon.php">آیکون های آب و هوا</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">رسانه ها</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>آلبوم عکس</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="light-gallery.html">گالری 1</a></li>
                                <li><a href="gallery1.html">گالری 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="flag"></i><span>اسلایدر</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="carousel.html">اسلایدر بوت استرپ</a></li>
                                <li><a class="nav-link" href="owl-carousel.html">اسلایدر چرخ فلک</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="timeline.html"><i
                                    data-feather="sliders"></i><span>جدول زمانی</span></a></li>
                        <li class="menu-header">نقشه ها</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span> نقشه های گوگل</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="gmaps-advanced-route.html">مسیر پیشرفته</a></li>
                                <li><a href="gmaps-draggable-marker.html">نشانگر قابل جابجایی</a></li>
                                <li><a href="gmaps-geocoding.html">جغرافیایی</a></li>
                                <li><a href="gmaps-geolocation.html"> نمونه نقشه</a></li>
                                <li><a href="gmaps-marker.html">نشانگر</a></li>
                                <li><a href="gmaps-multiple-marker.html">نشانگر چندگانه</a></li>
                                <li><a href="gmaps-route.html">مسیر</a></li>
                                <li><a href="gmaps-simple.html">ساده</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="vector-map.html"><i
                                    data-feather="map-pin"></i><span>نقشه جهانی</span></a>
                        </li>
                        <li class="menu-header">صفحات</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user-check"></i><span>احراز هویت</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="auth-login.html">ورود</a></li>
                                <li><a href="auth-register.html">ثبت نام</a></li>
                                <li><a href="auth-forgot-password.html">رمز عبور را فراموش کرده اید</a></li>
                                <li><a href="auth-reset-password.html">بازنشانی گذرواژه</a></li>
                                <li><a href="subscribe.html">اشتراک در خبرنامه</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="alert-triangle"></i><span>خطاها</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li>
                                <li><a class="nav-link" href="errors-403.html">403</a></li>
                                <li><a class="nav-link" href="errors-404.html">404</a></li>
                                <li><a class="nav-link" href="errors-500.html">500</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>صفحات دیگر</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="create-post.html">ایجاد پست</a></li>
                                <li><a class="nav-link" href="posts.html">نوشته ها</a></li>
                                <li><a class="nav-link" href="profile.html">مشخصات</a></li>
                                <li><a class="nav-link" href="contact.html">تماس با ما</a></li>
                                <li><a class="nav-link" href="invoice.html">صورتحساب</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="chevrons-down"></i><span>چند سطحی</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">منو 1</a></li>
                                <li class="dropdown">
                                    <a href="#" class="has-dropdown">منوی 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">منوی کودک 1</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="has-dropdown">منوی کودک 2</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">منوی کودک 1</a></li>
                                                <li><a href="#">منوی کودک 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"> منوی کودک 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>
    <!-- Main Content -->

        <div class="main-content">
            @yield('content')
            <?php /*require_once 'Template/footer.php'*/?>
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
</body>
</html>
