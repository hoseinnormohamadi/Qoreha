@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!-- <div class="page-scroll-nav">
                <nav class="scroll-init color2-bg">
                    <ul class="no-list-style">
                        <li><a class="act-scrlink tolt" href="#sec1" data-microtip-position="left" data-tooltip="درباره ما"><i class="fal fa-building"></i></a></li>
                        <li><a href="#sec2" class="tolt" data-microtip-position="left" data-tooltip="فیلم تبلیغاتی"><i class="fal fa-video"></i></a></li>
                        <li><a href="#sec3" class="tolt" data-microtip-position="left" data-tooltip="تیم ما"><i class="far fa-users-crown"></i></a></li>
                        <li><a href="#sec4" class="tolt" data-microtip-position="left" data-tooltip="چرا ما"><i class="fal fa-user-astronaut"></i></a></li>
                        <li><a href="#sec5" class="tolt" data-microtip-position="left" data-tooltip="نظرات مشتریان"><i class="fal fa-comment-alt-smile"></i></a></li>
                    </ul>
                </nav>
            </div> -->
            <!--  section  -->
            <section class="parallax-section single-par" data-scrollax-parent="true">
                <div class="bg par-elem " data-bg="{{asset('Frontassets/images/bg/5.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay op7"></div>
                <div class="container">
                    <div class="section-title center-align big-title">
                        <h2><span>درباره ما</span></h2>
                        <span class="section-separator"></span>
                    </div>
                </div>
                <div class="header-sec-link">
                    <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
                </div>
            </section>
            <!--  section  end-->
            <section id="sec1" data-scrollax-parent="true">
                <div class="container">
                    <div class="section-title">
                        <h2>درباره ما</h2>
                        <div class="section-subtitle">ما کی هستیم</div>
                        <span class="section-separator"></span>
                    </div>
                    <!--about-wrap -->
                    <div class="about-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="list-single-main-media fl-wrap" style="box-shadow: 0 9px 26px rgba(58, 87, 135, 0.2);">
                                    <img src="{{asset('Frontassets/images/all/1.jpg')}}" class="respimg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ab_text">
                                    <div class="ab_text-title fl-wrap">
                                        <h3>درباره ما</h3>
                                        <h4>برای اطلاع بیشتر درباره ما ، متن را بررسی کنید .</h4>
                                        <span class="section-separator fl-sec-sep"></span>
                                    </div>
                                    {!! $About !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- about-wrap end  -->
                    <span class="fw-separator"></span>
                    <div class=" single-facts bold-facts fl-wrap">
                        <!-- inline-facts -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="{{\App\Lottery::count()}}"></div>
                                    </div>
                                </div>
                                <h6>کل قرعه کشی ها</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="{{\App\User::count()}}"></div>
                                    </div>
                                </div>
                                <h6>کل کاربران</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="{{\App\Blog::count()}}"></div>
                                    </div>
                                </div>
                                <h6>کل اخبار</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="{{\App\Lottery::whereDate('created_at', \Carbon\Carbon::today())->count()}}"></div>
                                    </div>
                                </div>
                                <h6>قرعه های امروز</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                    </div>
                </div>
            </section>
            <!--section end-->
        </div>
        <!--content end-->
    </div>

@endsection
