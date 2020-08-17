@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!--section  -->
            <section class="hero-section" data-scrollax-parent="true">
                <div class="bg-tabs-wrap">
                    <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                        <div class="video-container">
                            <video autoplay loop muted class="bgvid">
                                <source src="http://citybook.kwst.net/video/4.mp4" type="video/mp4">
                            </video>
                        </div>
                        <!--
                                Vimeo code

                                 <div  class="background-vimeo" data-vim="97871257"> </div> -->
                        <!--
                                Youtube code

                                 <div  class="background-youtube-wrapper" data-vid="Hg5iNVSp2z8" data-mv="1"> </div> -->
                        <div class="bg mob_bg" data-bg="images/bg/8.jpg"></div>
                        <div class="overlay op7"></div>
                    </div>
                </div>
                <div class="container small-container">
                    <div class="intro-item fl-wrap">
                        <span class="section-separator"></span>
                        <div class="bubbles">
                            <h1>{{\App\Site::SiteName()}}</h1>
                        </div>
                    </div>
                    <!-- main-search-input-tabs-->
                    <div class="main-search-input-tabs  tabs-act fl-wrap">
                        <ul class="tabs-menu  no-list-style">
                            <li class="current"><a href="#tab-inpt1"> قرعه ها </a></li>
                            <li><a href="#tab-inpt4"> اخبار</a></li>
                            <!-- <li><a href="#tab-inpt2"> کنسرت</a></li>
                            <li><a href="#tab-inpt3"> رستوران</a></li>-->

                        </ul>
                        <!--tabs -->
                        <div class="tabs-container fl-wrap  ">
                            <!--tab -->
                            <div class="tab">
                                <div id="tab-inpt1" class="tab-content first-tab">
                                    <div class="main-search-input-wrap fl-wrap">
                                        <div class="main-search-input fl-wrap">
                                            <div class="main-search-input-item">
                                                <label><i class="fal fa-keyboard"></i></label>
                                                <input type="text" id="Key" placeholder="دنبال چی میگردی؟" value=""/>
                                            </div>
                                            <button class="main-search-button color2-bg"
                                                    onclick="SearchForLottery()">جستجو <i
                                                    class="far fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div id="tab-inpt4" class="tab-content">
                                    <div class="main-search-input-wrap fl-wrap">
                                        <div class="main-search-input fl-wrap">
                                            <div class="main-search-input-item">
                                                <label><i class="fal fa-cheeseburger"></i></label>
                                                <input type="text" id="BlogKey" placeholder="دنبال چی میگردی؟" value=""/>
                                            </div>
                                            <button class="main-search-button color2-bg"
                                                    onclick="SearchForNews()">جستجو <i
                                                    class="far fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--tab end-->
                        </div>
                        <!--tabs end-->
                    </div>

                </div>
                <div class="header-sec-link">
                    <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
                </div>
            </section>
            <!--section end-->
            <!--section  -->
            <section class="slw-sec" id="sec1">
                <div class="section-title">
                    <h2>آخرین اخبار</h2>
                    <div class="section-subtitle">جدیدترین اخبار</div>
                    <span class="section-separator"></span>
                </div>
                <div class="listing-slider-wrap fl-wrap">
                    <div class="listing-slider fl-wrap">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!--  swiper-slide  -->
                                @foreach(\App\Http\Controllers\FrontController::LastNews(6) as $new)
                                <div class="swiper-slide">
                                    <div class="listing-slider-item fl-wrap">
                                        <!-- listing-item  -->
                                        <div class="listing-item listing_carditem">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <!-- <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>ذخیره</span></div> -->
                                                    <a href="listing-single.html"
                                                       class="geodir-category-img-wrap fl-wrap">
                                                        <img src="{{$new->PostImage}}" alt="">
                                                    </a>
                                                    <div class="geodir_status_date color-bg"><i class="fal fa-clock"></i>
                                                        {{\Hekmatinasser\Verta\Verta::instance($new->created_at)->format('d F Y')}}
                                                    </div>
                                                    <div class="geodir-category-opt">
                                                        <div class="geodir-category-opt_title">
                                                            <h4><a href="listing-single.html">{{$new->PostName}}</a></h4>
                                                        </div>

                                                        <div class="listing_carditem_footer fl-wrap">
                                                            <div class="post-author">
                                                                <a><img
                                                                        src="{{$new->User->ProfileImage}}"
                                                                        alt=""><span>توسط ، {{\App\User::GetUserFullName($new->User->FirstName , $new->User->LastName)}}</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end -->
                                    </div>
                                </div>
                            @endforeach
                                    <!--  swiper-slide end  -->
                            </div>
                        </div>
                        <div class="listing-carousel-button listing-carousel-button-next2"><i
                                class="fas fa-caret-right"></i></div>
                        <div class="listing-carousel-button listing-carousel-button-prev2"><i
                                class="fas fa-caret-left"></i></div>
                    </div>
                    <div class="tc-pagination_wrap">
                        <div class="tc-pagination2"></div>
                    </div>
                </div>
            </section>
            <!--section end-->
            <div class="sec-circle fl-wrap"></div>
            <!--section -->
           {{-- <section class="gray-bg hidden-section particles-wrapper">
                <div class="container">
                    <div class="section-title">
                        <h2>آخرین دسته بندی ها</h2>
                        <div class="section-subtitle">کاتالوگ دسته بندی ها</div>
                        <span class="section-separator"></span>
                     </div>
                    <div class="listing-item-grid_container fl-wrap">
                        <div class="row">
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg" data-bg="images/all/56.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>16 </span> موقعیت</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="listing.html">تهران</a></h3>
                                        <!-- <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p> -->
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg" data-bg="images/all/57.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>22 </span> موقعیت</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="listing.html"> کرج</a></h3>
                                        <!-- <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p> -->
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg" data-bg="images/all/58.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>9 </span> موقعیت</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="listing.html"> اصفهان</a></h3>
                                        <!-- <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p> -->
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg" data-bg="images/all/60.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>12 </span> موقعیت</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="listing.html"> شیراز</a></h3>
                                        <!-- <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p> -->
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->
                            <div class="col-sm-8">
                                <div class="listing-item-grid">
                                    <div class="bg" data-bg="images/all/59.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>33 </span> موقعیت</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="listing.html">رشت</a></h3>
                                        <!-- <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p> -->
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                        </div>
                    </div>
                    <!-- <a href="listing.html" class="btn dec_btn   color2-bg">مشاهده همه شهرها<i class="fal fa-arrow-alt-left"></i></a> -->
                </div>
            </section>--}}
            <!--  section  -->
            <!--section end-->
            <section class="parallax-section small-par" data-scrollax-parent="true">
                <div class="bg par-elem " data-bg="images/bg/22.jpg"
                     data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay  op7"></div>
                <div class="container">
                    <div class=" single-facts single-facts_2 fl-wrap">
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
            <!--section  -->
            <section>
                <div class="container big-container">
                    <div class="section-title">
                        <h2><span>آخرین قرعه کشی ها</span></h2>
                        <div class="section-subtitle">آخرین قرعه کشی ها</div>
                        <span class="section-separator"></span>

                    </div>

                    <div class="grid-item-holder gallery-items fl-wrap">
                        <!--  gallery-item-->
                        @foreach(\App\Http\Controllers\FrontController::LastLottery(8) as $lottery)
                        <div class="gallery-item events">
                            <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <!-- <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>ذخیره</span></div> -->
                                        <a href="/Lottery/{{$lottery->id}}" class="geodir-category-img-wrap fl-wrap">
                                            <img src="{{$lottery->LotteryImage}}" alt="">
                                        </a>
                                        <div class="listing-avatar">
                                            <a><img
                                                    src="{{$lottery->User->ProfileImage}}" alt=""></a>
                                            <span class="avatar-tooltip">اضافه شده توسط  <strong>{{$lottery->User->FirstName .' ' . $lottery->User->LastName}}</strong></span>

                                        </div>
                                        <div class="geodir_status_date color-bg"><i class="fal fa-clock"></i>{{\Hekmatinasser\Verta\Verta::instance($lottery->created_at)->format('d F Y')}}</div>
                                        <div class="geodir-category-opt">

                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap title-sin_item">
                                        <div class="geodir-category-content-title fl-wrap ">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a href="/Lottery/{{$lottery->id}}">کنسرت</a></h3>
                                                <!-- <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>  ایران , تهران , زعفرانیه</a></div> -->
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">{!! Str::limit($lottery->LotteryContent, 100) !!}</p>

                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <!-- <div class="listing-item-category purp-bg"><i class="fal fa-cocktail"></i></div> -->
                                                <span>{{$lottery->Categori->name}}</span>
                                            </a>

                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                        </div>
                        @endforeach
                            <!-- gallery-item  end-->

                    </div>
                    <a href="/Lotterys" class="btn  dec_btn  color2-bg">تمام قرعه کشی ها<i
                            class="fal fa-arrow-alt-left"></i></a>
                </div>
            </section>
        </div>
        <!--content end-->
    </div>

@endsection

@section('js')
    <script>
        function SearchForLottery() {
            var Key = document.getElementById('Key').value;
            window.location.href='/Search?Key='+Key;
        }
        function SearchForNews() {
            var Key = document.getElementById('BlogKey').value;
            window.location.href='/blog?Key='+Key;
        }
    </script>
    @endsection
