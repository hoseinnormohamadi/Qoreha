<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('Frontassets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/FontAwesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('Frontassets/style/main.css')}}">

    <style>
        #main-header {
            background: white;
        }

        #main-header a:hover {
            color: #ef394e;
        }
    </style>
</head>

<body>

<section id="header">
    <div class="container">
        <div class="row">
            <div class="col-12 d-none d-md-flex" id="main-header">
                <a href="">موبایل و تبلت <i class="fas fa-mobile-alt"></i></a>
                <a href="">لپ‌تاپ، کامپیوتر، اداری <i class="fas fa-laptop"></i></a>
                <a href="">هایپر مارکت <i class="fas fa-shopping-cart"></i></a>
                <a href="">صوتی و تصویری <i class="fas fa-headphones-alt"></i></a>
                <a href="">سایر دسته ها <i class="fas fa-bars"></i></a>
            </div>
            <div class="col-12 d-md-none" id="mobile-header">
                <input type="checkbox" id="burger-menu-input">
                <label for="burger-menu-input" class="burger-bar">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </label>
            </div>
        </div>
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
    </div>
</section>

@yield('content')

<section id="index-footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12  col-xl-3  index-footer-leftside">
                <a href="">دکمه</a>
                <a href="">دکمه</a>
                <a href="">دکمه</a>
            </div>
            <div class="col-12 col-sm-12 col-md-12 d-none d-lg-flex  col-lg-12 col-xl-9 index-footer-rightside">
                <a href="">فروشگاه‌ها </a>
                <a href="">قوانین و مقررات</a>
                <a href="">ثبت‌نام فروشگاه‌ها</a>
                <a href="">تماس با ما</a>
                <a href="">درباره ترب </a>
                <a href="">پنل فروشگاه‌ها</a>
                <a href="">ثبت شکایت از فروشگاه</a>
            </div>
        </div>
    </div>

</section>
</body>
<script src="{{asset('Frontassets/FontAwesome/js/all.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{asset('Frontassets/slick/slick.min.js')}}"></script>
<script>
    $('.lazy').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                dots: false,
                centerPadding: '40px',
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '40px',
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '40px',
            }
        }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    var mobileMenuBody = document.querySelector(".mobile-menu-body")
    var bodyElem = document.querySelector("body")

    document.getElementById("burger-menu-input").addEventListener("change", () => {
        mobileMenuBody.classList.toggle("mobile-menu-body-open");

        if (mobileMenuBody.classList.contains("mobile-menu-body-open")) {
            bodyElem.style.overflow = "hidden"
        } else {
            bodyElem.style.overflow = "visible"
        }
    })
</script>

</html>
