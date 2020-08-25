<!DOCTYPE HTML>
<html lang="fa">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>{{\App\Site::SiteName()}}</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{asset('Frontassets/css/reset.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('Frontassets/css/plugins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('Frontassets/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('Frontassets/css/color.css')}}">
@yield('head')
<!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{\App\Site::SiteIcon()}}">
</head>

<body>
<!--loader-->
<div class="loader-wrap">
    <div class="loader-inner">
        <div class="loader-inner-cirle"></div>
    </div>
</div>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!-- header -->
    <header class="main-header">
        <!-- logo-->
        <a href="/" class="logo-holder">
            <img src="{{\App\Site::SiteIcon()}}" alt=""></a>
        <!-- logo end-->
        <!-- header-search_btn-->
        <div class="header-search_btn show-search-button"><i class="fal fa-search"></i><span>جستجو</span></div>
        <!-- header-search_btn end-->
        <!-- header opt -->
        <a href="#" class="add-list color-bg">ثبت تبلیغ <span><i class="fal fa-layer-plus"></i></span></a>
        <!-- <div class="cart-btn   show-header-modal" data-microtip-position="bottom" role="tooltip" aria-label="Your Wishlist"><i class="fal fa-heart"></i><span class="cart-counter green-bg"></span> </div> -->
            @auth()
            <div class="header-user-menu">
                <div class="header-user-name">
                    <span><img src="{{Auth::user()->ProfileImage}}" alt=""></span>
                    {{\App\User::FullName()}}
                </div>
                <ul>
                    <li><a href="#"> ویرایش پروفایل</a></li>
                    <li><a href="#"> ثبت تبلیغ</a></li>
                    <li><a href="#">  رزرو  </a></li>
                    <li><a href="#"> بررسی ها </a></li>
                    <li><a href="#">خروج</a></li>
                </ul>
            </div>
            @endauth
            @guest()
           <a href="/panel"> <div class="show-reg-form modal-open avatar-img">
                <i class="fal fa-user"></i>
                ورود
            </div>
           </a>

    @endguest

        <!-- header opt end-->
        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul class="no-list-style">
                    @foreach(\App\Menu::all() as $menu)
                    <li>
                        <a href="{{$menu->Link}}" >{{$menu->Name}}</a>
                    </li>
                    @endforeach
                  {{--  <li>
                        <a href="#">دسته ها <i class="fa fa-caret-down @if(request()->segment(1) == 'category') act-link @endif"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="listing.html">ستون نقشه 1</a></li>
                        </ul>
                        <!--second level end-->
                    </li>--}}
                    {{--<li>
                        <a href="/blog" class="@if(request()->segment(1) == 'blog') act-link @endif">اخبار</a>
                    </li>
                    <li>
                        <a href="/Lotterys" class="@if(request()->segment(1) == 'Lotterys') act-link @endif">قرعه ها </a>

                    </li>
                    <li>
                        <a href="/about-us" class="@if(request()->segment(1) == 'about-us') act-link @endif">درباره ما </a>
                    </li>
                    <li>
                        <a href="/contact-us" class="@if(request()->segment(1) == 'contact-us') act-link @endif">تماس با ما </a>
                    </li>--}}
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
        <!-- header-search_container -->
        <div class="header-search_container header-search vis-search">
            <div class="container small-container">
                <div class="header-search-input-wrap fl-wrap">
                    <form method="get" action="/Search">
                        <!-- header-search-input -->
                        <div class="header-search-input">
                            <label><i class="fal fa-keyboard"></i></label>
                            <input type="text" placeholder="دنبال چی میگردی؟" value="" name="Key"/>
                        </div>
                        <input type="submit" value="جست و جو" class="header-search-button green-bg">
                    </form>
                </div>
                <div class="header-search_close color-bg"><i class="fal fa-long-arrow-up"></i></div>
            </div>
        </div>
        <!-- header-search_container  end -->
    </header>
    <!-- header end-->
    <!-- wrapper-->






@yield('content')
<!-- wrapper end-->
    <!--footer -->
    <footer class="main-footer fl-wrap">
        <!-- footer-header-->
        <!-- <div class="footer-header fl-wrap grad ient-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="subscribe-header">
                            <h3>برای عضویت در <span>خبرنامه</span></h3>
                            <p>آیا می خواهید در مورد مکان های جدید مطلع شوید؟ فقط ثبت نام کنید.</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="subscribe-widget">
                            <div class="subcribe-form">
                                <form id="subscribe">
                                    <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="ایمیل خود را وارد کنید" spellcheck="false" type="text">
                                    <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fal fa-envelope"></i></button>
                                    <label for="subscribe-email" class="subscribe-message"></label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- footer-header end-->
        <!--footer-inner-->
        <div class="footer-inner   fl-wrap">
            <div class="container">
                <div class="row">
                    <!-- footer-widget-->
                    <div class="col-md-4">
                        <div class="footer-widget fl-wrap">
                            <div class="footer-logo">
                                <a href="/"><img src="{{\App\Site::SiteIcon()}}" alt=""></a>
                            </div>
                            <div class="footer-contacts-widget fl-wrap">
                                <p>{!! \App\Site::find(1)->AboutUs !!}</p>
                                <ul class="footer-contacts fl-wrap no-list-style">
                                    <li><span><i class="fal fa-envelope"></i> ایمیل :</span><a
                                            href="mailto:{{\App\Site::find(1)->Email}}"
                                            target="_blank">{{\App\Site::find(1)->Email}}</a>
                                    </li>
                                    <li><span><i class="fal fa-map-marker"></i> آدرس :</span><a href="#"
                                                                                                target="_blank">{{\App\Site::find(1)->Address}}</a>
                                    </li>
                                    <li><span><i class="fal fa-phone"></i> تلفن :</span><a
                                            href="tell:{{\App\Site::find(1)->PhoneNumber}}">{{\App\Site::find(1)->PhoneNumber}}</a>
                                    </li>
                                </ul>
                                <div class="footer-social">
                                    <span>ما را دنبال کنید: </span>
                                    <ul class="no-list-style">
                                        <li><a href="https://facebook.com/{{\App\Site::find(1)->Facebook}}"
                                               target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/{{\App\Site::find(1)->twitter}}"
                                               target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://instagram.com/{{\App\Site::find(1)->instagram}}"
                                               target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://t.me/{{\App\Site::find(1)->Telegram}}" target="_blank"><i
                                                    class="fab fa-telegram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget end-->
                    <!-- footer-widget-->
                    <div class="col-md-4">
                        <div class="footer-widget fl-wrap">
                            <h3>آخرین اخبار ما</h3>
                            <div class="footer-widget-posts fl-wrap">
                                <ul class="no-list-style">
                                    @foreach(\App\Http\Controllers\FrontController::LastNews(3) as $New)
                                        <li class="clearfix">
                                            <a href="#" class="widget-posts-img"><img
                                                    src="{{$New->PostImage}}" class="respimg"
                                                    alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">{{$New->PostName}}</a>
                                                <span class="widget-posts-date"><i class="fal fa-calendar"></i> {{\Hekmatinasser\Verta\Verta::instance($New->created_at)}}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="/blog" class="footer-link">همه اخبار <i class="fal fa-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget end-->
                    <!-- footer-widget  -->
                    <div class="col-md-4">
                        <div class="footer-widget fl-wrap">
                            <h3>آخرین قرعه کشی ها</h3>
                            <div class="footer-widget-posts fl-wrap">
                                <ul class="no-list-style">
                                    @foreach(\App\Http\Controllers\FrontController::LastLottery(3) as $lottery)
                                        <li class="clearfix">
                                            <a href="/Lottery/{{$lottery->id}}" class="widget-posts-img"><img
                                                    src="{{$lottery->LotteryImage}}" class="respimg"
                                                    alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="/Lottery/{{$lottery->id}}" title="">{{$lottery->LotteryTitle}}</a>
                                                <span class="widget-posts-date"><i class="fal fa-calendar"></i> {{\Hekmatinasser\Verta\Verta::instance($lottery->created_at)}} </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="/lotterys" class="footer-link">همه قرعه کشی ها <i
                                        class="fal fa-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget end-->
                </div>
            </div>
            <!-- footer bg-->
            <div class="footer-bg" data-ran="4"></div>
            <div class="footer-wave">
                <svg viewbox="0 0 100 25">
                    <path fill="#fff" d="M0 30 V12 Q30 6 55 12 T100 11 V30z"/>
                </svg>
            </div>
            <!-- footer bg  end-->
        </div>
        <!--footer-inner end -->
        <!--sub-footer-->
        <div class="sub-footer  fl-wrap">
            <div class="container">
                <div class="copyright"> &#169; <a href="https://amatisweb.ir">آماتیس</a> 2020. کلیه حقوق محفوظ است.
                </div>
                <!-- <div class="lang-wrap">
                    <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>fa</strong></span><i class="fa fa-caret-down arrlan"></i></div>
                    <ul class="lang-tooltip lang-action no-list-style">
                        <li><a href="#" class="current-lan" data-lantext="Fa">فارسی</a></li>
                        <li><a href="#" data-lantext="Fr">فرانسوی</a></li>
                        <li><a href="#" data-lantext="Es">اسپانیایی</a></li>
                        <li><a href="#" data-lantext="En">انگلیسی</a></li>
                    </ul>
                </div> -->
                <div class="subfooter-nav">
                    <ul class="no-list-style">
                        <li><a href="#">شرایط استفاده</a></li>
                        <li><a href="#">سیاست حفظ حریم خصوصی</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--sub-footer end -->
    </footer>
    <!--footer end -->
    <!--register form -->
    <div class="main-register-wrap modal">
        <div class="reg-overlay"></div>
        <div class="main-register-holder tabs-act">
            <div class="main-register fl-wrap  modal_main">
                <div class="main-register_title">به شهر <span><strong>تبلیغ </strong>خوش آمدید<strong>.</strong></span>
                </div>
                <div class="close-reg"><i class="fal fa-times"></i></div>
                <ul class="tabs-menu fl-wrap no-list-style">
                    <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> وارد شدن</a></li>
                    <li><a href="#tab-2"><i class="fal fa-user-plus"></i> ثبت نام</a></li>
                </ul>
                <!--tabs -->
                <div class="tabs-container">
                    <div class="tab">
                        <!--tab -->
                        <div id="tab-1" class="tab-content first-tab">
                            <div class="custom-form">
                                <form method="post" name="registerform">
                                    <label>نام کاربری یا آدرس ایمیل <span>*</span> </label>
                                    <input name="email" type="text" onClick="this.select()" value="">
                                    <label>کلمه عبور <span>*</span> </label>
                                    <input name="password" type="password" onClick="this.select()" value="">
                                    <button type="submit" class="btn float-btn color2-bg"> وارد <i
                                            class="fas fa-caret-left"></i></button>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <input id="check-a3" type="checkbox" name="check">
                                        <label for="check-a3">مرا به خاطر بسپار</label>
                                    </div>
                                </form>
                                <div class="lost_password">
                                    <a href="#">رمزعبور خود را گم کردید؟</a>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-2" class="tab-content">
                                <div class="custom-form">
                                    <form method="post" name="registerform" class="main-register-form"
                                          id="main-register-form2">
                                        <label>نام و نام خانوادگی <span>*</span> </label>
                                        <input name="name" type="text" onClick="this.select()" value="">
                                        <label>آدرس ایمیل <span>*</span></label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>کلمه عبور <span>*</span></label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <div class="filter-tags ft-list">
                                            <input id="check-a2" type="checkbox" name="check">
                                            <label for="check-a2">من با سیاست حفظ حریم خصوصی <a
                                                    href="#">موافقم</a></label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="filter-tags ft-list">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">شرایط را <a href="#">قبول دارم</a></label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button type="submit" class="btn float-btn color2-bg"> ثبت نام <i
                                                class="fas fa-caret-left"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                    <div class="log-separator fl-wrap"><span>یا</span></div>
                    <div class="soc-log fl-wrap">
                        <p>برای ورود سریع یا ثبت نام از حساب اجتماعی خود استفاده کنید.</p>
                        <a href="#" class="facebook-log"> فیسبوک</a>
                    </div>
                    <div class="wave-bg">
                        <div class='wave -one'></div>
                        <div class='wave -two'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--register form end -->
    <a class="to-top"><i class="fas fa-caret-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script src="{{asset('Frontassets/js/jquery.min.js')}}"></script>
<script src="{{asset('Frontassets/js/plugins.js')}}"></script>
<script src="{{asset('Frontassets/js/scripts.js')}}"></script>

@yield('js')

</body>



</html>
