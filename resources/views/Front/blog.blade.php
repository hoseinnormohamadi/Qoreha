@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!--  section  -->
            <section class="parallax-section single-par" data-scrollax-parent="true">
                <div class="bg par-elem " data-bg="{{asset('Frontassets/images/bg/6.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay op7"></div>
                <div class="container">
                    <div class="section-title center-align big-title">
                        <h2><span>آخرین اخبار ما</span></h2>
                        <span class="section-separator"></span>
                    </div>
                </div>
                <div class="header-sec-link">
                    <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
                </div>
            </section>
            <!--  section  end-->
            <section class="gray-bg no-top-padding-sec" id="sec1">
                <div class="container">

                    <div class="post-container fl-wrap">
                        <div class="row">
                            <!-- blog content-->
                            <div class="col-md-8">
                                <!-- article> -->
                                @foreach($News as $new)
                                <article class="post-article">
                                    <div class="list-single-main-media fl-wrap">
                                        <img src="{{$new->PostImage}}" class="respimg" alt="">
                                    </div>
                                    <div class="list-single-main-item fl-wrap block_box">
                                        <h2 class="post-opt-title"><a href="blog-single.html">{{$new->PostName}}</a></h2>
                                        {!! Str::limit($new->PostContent, 130) !!}
                                        <span class="fw-separator"></span>
                                        <div class="post-author">
                                            <a><img src="{{$new->User->ProfileImage}}" alt=""><span>توسط ، {{\App\User::GetUserFullName($new->User->FirstName , $new->User->LastName)}}</span></a>
                                        </div>
                                        <div class="post-opt">
                                            <ul class="no-list-style">
                                                <li><i class="fal fa-calendar"></i> <span>{{\Hekmatinasser\Verta\Verta::instance($new->created_at)->format('d F Y')}}</span></li>
                                            </ul>
                                        </div>
                                        <a href="blog-single.html" class="btn  color2-bg float-btn">بیشتر بخوانید<i class="fal fa-angle-left"></i></a>
                                    </div>
                                </article>
                            @endforeach
                                <!-- article end -->
                            </div>
                            <!-- blog conten end-->
                            <!-- blog sidebar -->
                            <div class="col-md-4">
                                <div class="box-widget-wrap fl-wrap fixed-bar">
                                    <!--box-widget-item -->
                                    <div class="box-widget-item fl-wrap block_box">
                                        <div class="box-widget-item-header">
                                            <h3>جستجو در وبلاگ</h3>
                                        </div>
                                        <div class="box-widget fl-wrap">
                                            <div class="box-widget-content">
                                                <div class="search-widget">
                                                    <form action="/blog" method="get" class="fl-wrap">
                                                        <input name="Key" id="Key" type="text" class="search" placeholder="جستجو..." value="@if(request('Key') !== null) {{request('Key')}}@endif" />
                                                        <button class="search-submit color2-bg" id="submit_btn"><i class="fal fa-search"></i> </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget-item end -->
                                    <!--box-widget-item -->

                                    <!--box-widget-item end -->
                                    <!--box-widget-item -->

                                    <!--box-widget-item end -->
                                    <!--box-widget-item -->

                                    <!--box-widget-item end -->
                                    <!--box-widget-item -->

                                    <!--box-widget-item end -->
                                </div>
                            </div>
                            <!-- blog sidebar end -->
                        </div>
                    </div>
                </div>
            </section>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>

@endsection
