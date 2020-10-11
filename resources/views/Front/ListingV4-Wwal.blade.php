@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="hero-section" data-scrollax-parent="true">
                <div class="bg-tabs-wrap">
                    <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }"
                         style="transform: translateZ(0px) translateY(-44.0771px);">
                        <div class="bg mob_bg" data-bg="images/bg/8.jpg"
                             style="background-image: url(&quot;images/bg/8.jpg&quot;);"></div>
                        <div class="overlay op7"></div>
                    </div>
                </div>
                <div class="container small-container">
                    <div class="intro-item fl-wrap">
                        <span class="section-separator"></span>
                        <div class="bubbles">
                            <h1>بدون قرعه کشی برنده باش</h1>
                            <div class="individual-bubble"
                                 style="left: 131px; width: 8px; height: 8px; bottom: 99.6578%; opacity: 0.302396;"></div>
                            <div class="individual-bubble"
                                 style="left: 86px; width: 4px; height: 4px; bottom: 97.8611%; opacity: 0.314972;"></div>
                            <div class="individual-bubble"
                                 style="left: 129px; width: 6px; height: 6px; bottom: 94.4657%; opacity: 0.33874;"></div>
                            <div class="individual-bubble"
                                 style="left: 58px; width: 6px; height: 6px; bottom: 89.6638%; opacity: 0.372354;"></div>
                            <div class="individual-bubble"
                                 style="left: 103px; width: 2px; height: 2px; bottom: 83.3536%; opacity: 0.416525;"></div>
                            <div class="individual-bubble"
                                 style="left: 63px; width: 4px; height: 4px; bottom: 74.6488%; opacity: 0.477459;"></div>
                            <div class="individual-bubble"
                                 style="left: 65px; width: 4px; height: 4px; bottom: 66.0111%; opacity: 0.537922;"></div>
                            <div class="individual-bubble"
                                 style="left: 134px; width: 6px; height: 6px; bottom: 55.043%; opacity: 0.614699;"></div>
                            <div class="individual-bubble"
                                 style="left: 72px; width: 4px; height: 4px; bottom: 42.5436%; opacity: 0.702195;"></div>
                            <div class="individual-bubble"
                                 style="left: 134px; width: 8px; height: 8px; bottom: 28.1744%; opacity: 0.802779;"></div>
                            <div class="individual-bubble"
                                 style="left: 121px; width: 6px; height: 6px; bottom: 12.8111%; opacity: 0.910322;"></div>
                        </div>
                    </div>
                    <!-- main-search-input-tabs-->
                    <div class="main-search-input-tabs  tabs-act fl-wrap">
                        <ul class="tabs-menu  no-list-style">
                            <li class="current"><a href="#tab-inpt1">بدون قرعه کشی برنده باش</a></li>
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
                                                <input type="text" id="Key" placeholder="دنبال چی میگردی؟" value="">
                                            </div>
                                            <button class="main-search-button color2-bg" onclick="SearchForLottery()">
                                                جستجو <i class="far fa-search"></i></button>
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
            <section class="gray-bg hidden-section particles-wrapper">
                <div class="container">
                    <div class="section-title">
                        <h2>قرعه کشی ها</h2>
                        <div class="section-subtitle">قرعه کشی ها</div>
                        <span class="section-separator"></span>
                    </div>
                    @php
                        $Ad = \App\Ads::where('Status','Active')->inRandomOrder()->limit(3)->get();
                    @endphp
                    <div class="listing-item-grid_container fl-wrap">
                        <div class="row">
                            @foreach($Data as $data)
                                <div class="col-sm-3">
                                        <a href="{{route('ShowWwal' , $data->id)}}" target="_blank">
                                            <div class="listing-item-grid">
                                                <div class="bg" data-bg="{{$data->Image}}"></div>
                                                <div class="d-gr-sec"></div>
                                                <div class="listing-item-grid_title">
                                                    <h3><a href="{{route('ShowWwal' , $data->id)}}">{{$data->Name}}</a></h3>
                                                </div>
                                            </div>
                                        </a>

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination">
                        {!! $Data->links("pagination::Front") !!}
                    </div>
                    <!-- <a href="listing.html" class="btn dec_btn   color2-bg">مشاهده همه شهرها<i class="fal fa-arrow-alt-left"></i></a> -->
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
            window.location.href = '/Search?Key=' + Key;
        }

    </script>
@endsection
