<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{\App\Site::SiteName()}}</title>
    <link rel="stylesheet" href="{{asset('Frontassets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/FontAwesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/style/main.css')}}">
    @yield('head')
</head>

<body>
<section id="header">
    <div class="container-fluid">

        <div class="mobile-menu-body">
            <div class="container">
                <div class="mobile-menu">
                    <a href="">موبایل و تبلت <i class="fas fa-mobile-alt"></i></a>
                    <a href="">لپ‌تاپ، کامپیوتر، اداری <i class="fas fa-laptop"></i></a>
                    <a href="">هایپر مارکت <i class="fas fa-shopping-cart"></i></a>
                    <a href="">صوتی و تصویری <i class="fas fa-headphones-alt"></i></a>
                    <a href="">سایر دسته ها <i class="fas fa-bars"></i></a>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-12 centralize header-logo"></div>
            <div class="col-6 col-md-4  d-flex align-items-center">
                <div class="socials-header">
                    <a href="https://instagram.com/{{\App\Site::find(1)->instagram}}"><i class="fab fa-instagram "></i></a>
                    <a href="https://twitter.com/{{\App\Site::find(1)->twitter}}"><i class="fab fa-twitter-square "></i></a>
                    <a href="https://facebook.com/{{\App\Site::find(1)->Facebook}}"><i class="fab fa-facebook-square "></i></a>
                </div>
            </div>


            <div class="col-6 col-md-4 search-bar d-none d-md-flex ">
                <input type="text">
                <i class="fas fa-search"></i>
                <div class="search-button">جست و جو</div>
            </div>
            <div class="col-6 col-md-4 " style="padding: 0 65px; display: flex; justify-content: flex-end; align-items: center;"><a href="/"><img src="{{\App\Site::SiteIcon()}}" width="40px" height="40px" alt=""></a></div>

        </div>
    </div>


    <div class="d-none d-md-flex" id="main-header">
        <div class="header-big-screen">
            <ul>
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        دسته بندی
                    </a>
                </li>
                <li>
                    <a href="about-us.html">
                        درباره ما
                    </a>
                </li>
                <li>
                    <a href="about-us.html">
                        تماس با ما
                    </a>
                </li>
            </ul>
            <div class="col-4 align-left">
                <a href="/panel" class="login-button">
                   @if(Auth::check())
                       پنل کاربری
                    @else
                       وارد شوید
                       @endif
                    <i class="fas fa-user"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-md-none" id="mobile-header">
            <input type="checkbox" id="burger-menu-input">
            <label for="burger-menu-input" class="burger-bar">
                <div class="line line-1 "></div>
                <div class="line line-2 "></div>
                <div class="line line-3 "></div>
            </label>
        </div>
    </div>
</section>

@yield('content')

<section>
    <div class="main-footer">
        <div class="main-footer-top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-7 col-xs-5">
                        <div class="row">
                            <div class="col-12 top-bar-footer-title"> را دنبال کنید تا از تغییرات قیمت کالای مورد علاقه خود سریع‌تر باخبر شوید</div>
                            <div class="col-4">logo</div>
                            <div class="col-4">logo</div>
                            <div class="col-4">
                                <div class="footer-socials">
                                    <i class="fab fa-instagram-square"></i>
                                    <i class="fab fa-twitter-square"></i>
                                    <i class="fab fa-facebook-square"></i>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-5 col-xs-7">
                        <div class="row">
                            <div class="col-4 col-sm-6 col-md-4 footer-columns d-none d-sm-block">
                                <div class="footer-column-title">فروشگاه ها در </div>
                                <div class="footer-column-item">فهرست فروشگاه ها</div>
                                <div class="footer-column-item">ثبت نام فروشگاه ها</div>
                                <div class="footer-column-item">پنل فروشگاه ها</div>
                            </div>
                            <div class="col-4 footer-columns  d-none d-md-block">
                                <div class="footer-column-title">درباره </div>
                                <div class="footer-column-item">درباره ما</div>
                                <div class="footer-column-item">تماس باما</div>

                            </div>
                            <div class="col-12 col-sm-6 col-md-4 footer-columns">
                                <div class="footer-column-title">پشتیبانی</div>
                                <div class="footer-column-item">سوالات متداول</div>
                                <div class="footer-column-item">راهنمای استفاده از </div>
                                <div class="footer-column-item">پیشنهاد ات و گذارش خطا</div>
                                <div class="footer-column-item">ثبت شکایت از فروشگاه</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="main-footer-bottom-bar">
            <div class="container">
                <div class="row copy-right">
                    <div class="col-12 col-xs-12 col-sm-4 copy-right-left-side">copyright © 2015-2020 amatis.ir</div>
                    <div class="col-12 col-xs-12 col-sm-8 copy-right-right-side">
                            <span>
                      شرایط استفاده
                    </span>
                        <span>
                      حریم خصوصی
                    </span>
                        <span>
                      کلیه حقوق این سایت متعلق به شرکت آماتیس میباشد
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('Frontassets/FontAwesome/js/all.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
@if(session('errors'))
    <script src="{{asset('assets/Plugin/SweetAlert2/SweetAlert2.js')}}"></script>
    <script type="text/javascript">
        Swal.fire({
            icon: 'info',
            title: 'پیام سایت',
            text: @if($errors->any())
            @foreach ($errors->all() as $error)
            '<div>{{$error}}</div><br>'
            @endforeach
            @elseif(session('errors'))
            {{session('errors')->first('msg')}}
            @endif
        })
    </script>



@endif


@yield('js')







</body>

</html>
