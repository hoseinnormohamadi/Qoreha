@extends('Front.layout')
@section('content')
<section id="main">
        <div class="container">
            <div class="row main-box">
                <div class="col-12 col-sm-10 col-md-7">
                    <div class="logo-box col-12">
                        <div class="col-8 text">
                            <div class="text-title">{{\App\Site::SiteName()}}</div>

                        </div>
                        <div class="col-4 logo centralize">
                            <img src="{{\App\Site::SiteIcon()}}" width="50" height="50">
                        </div>
                    </div>
                    <div class="search-bar col-xs-12">
                        <div class="col-12 search-input-box">
                            <input type="text" class="search-input" placeholder="نام قرعه کشی را وارد کنید">
                            <div class="search-icon"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                    <div class="discount-box col-12">
                        <a href="main-page.html" class="discount">
                            خبر ها
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="slider-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <section class="lazy slider" data-sizes="50vw">
                        @foreach($LastLotterys as $LastLottery)
                            <div>
                                <div class="slider-box">
                                    <div class="slider-child-box">
                                        <div class="slider-box-logo"> <img src="{{$LastLottery->LotteryImage}}" alt=""></div>

                                        <div class="slider-box-title">{{$LastLottery->LotteryTitle}}</div>
                                        <div class="slider-box-time">{{$LastLottery->LotteryDate}} <i class="fas fa-calendar-week"></i></div>
                                        <div class="slider-box-participants">
                                            <div>
                                                0
                                            </div>
                                            <div>
                                                افراد شرکت کننده <i class="fas fa-user-friends"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
                <div class="col-3 slider-right-section">
                    قرعه های امروز
                </div>
            </div>
        </div>
    </section>
@endsection
