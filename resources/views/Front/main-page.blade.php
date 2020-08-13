@extends('Front.layout2')
@section('head')
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .slick-slide {
            margin: 0px 0px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }

        .slick-active {
            opacity: .5;
        }

        .slick-current {
            opacity: 1;
        }

        .slick-prev {
            left: -8px;
        }
    </style>
@endsection
@section('content')

    <section class="main-page-top-row ">
        <div class="container ">
            <div class="row ">
                <div class="col-12 col-lg-10 ">
                    <div class="main-page-slider ">
                        <section class="lazy slider carousel">
                            @foreach($Sliders as $Slider)
                            <div class="slide">
                                <img data-lazy="{{$Slider->Image}}"
                                     data-srcset="{{$Slider->Image}}"
                                     data-sizes="100vw">
                            </div>

                            @endforeach
                        </section>
                    </div>
                </div>
                <div class="col-2 d-none d-lg-block ">
                    <ul class="slider-categories ">
                        @foreach($Categorys as $Category)
                        <li><a href="#"><i class="fab fa-plus-square"></i>{{$Category->name}}</a></li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <section class="recent-lotteries each-section ">
            <div class="container ">
                <div class="row ">
                    <div class="col-12 padding-top-bottom-15 ">
                        <div class="section-title-box " style="--some-color:#d73948 ">
                            <span class="section-title-text ">
              آخرین قرعه کشی ها
              <i class="fas fa-certificate "></i>
            </span>
                        </div>
                    </div>

                    @foreach($LastLotterys as $lottery)

                    <div class="col-12 col-md-4 recent-box padding-top-bottom-15 ">
                        <div class="img ">
                            <img src="{{$lottery->LotteryImage}}" alt=""> <a href="#"
                                                                                       class="go-to-button ">مشاهده</a>
                        </div>
                        <div class="describtion-box ">
                            <div>
                                {{$lottery->LotteryTitle}}
                            </div>
                            <div>
                                <i class="fas fa-gifts "></i>00
                            </div>

                        </div>
                    </div>


                    @endforeach


                </div>
            </div>
        </section>



    </section>


@endsection




@section('js')
    <script src="{{asset('Frontassets/slick/slick.min.js')}}"></script>
    <script src="{{asset('Frontassets/js/menu.js')}}"></script>
    <script>
        $(".lazy").slick({
            lazyLoad: 'ondemand', // ondemand progressive anticipated
            infinite: true
        });
        $('.fade').slick({
            dots: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
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
                // settings: "unslick "
                // instead of a settings object
            ]
        });
    </script>
@endsection
