@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="gray-bg no-top-padding-sec" id="sec1">
                <div class="container">

                    <div class="share-holder hid-share sing-page-share top_sing-page-share">
                        <div class="share-container  isShare"></div>
                    </div>
                    <div class="post-container fl-wrap">
                        <div class="row">
                            <!-- blog content-->
                            <div class="col-md-8">
                                <!-- article> -->
                                <article class="post-article single-post-article">
                                    <div class="list-single-main-media fl-wrap">
                                        <div class="single-slider-wrap">
                                            <div class="single-slider fl-wrap">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper lightgallery">
                                                        <div class=" hov_zoom"><img src="{{$News->PostImage}}" alt="">
                                                            <a href="{{$News->PostImage}}"
                                                               class="box-media-zoom   popup-image">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-single-main-item fl-wrap block_box">
                                        <h2 class="post-opt-title">{{$News->PostName}}</h2>
                                        <div class="post-author">
                                            <a href="#"><img src="{{$News->User->ProfileImage}}"
                                                             alt=""><span>توسط ، {{\App\User::GetUserFullName($News->User->FirstName , $News->User->LastName)}}</span></a>
                                        </div>
                                        <div class="post-opt">
                                            <ul class="no-list-style">
                                                <li><i class="fal fa-calendar"></i> <span>{{\Hekmatinasser\Verta\Verta::instance($News->created_at)->format('d F Y')}}</span></li>
                                            </ul>
                                        </div>
                                        <span class="fw-separator"></span>
                                        <div class="clearfix"></div>
                                        {!! $News->PostContent !!}
                                        <span class="fw-separator"></span>
                                        {{--<div class="list-single-tags tags-stylwrap">
                                            <span class="tags-title"><i class="fas fa-tag"></i> برچسب ها : </span>
                                            <a href="#">هتل</a>
                                            <a href="#">خوابگاه</a>
                                            <a href="#">اتاق</a>
                                            <a href="#">آبگرم</a>
                                            <a href="#">رستوران</a>
                                            <a href="#">پارکینگ</a>
                                        </div>--}}
                                    </div>
                                </article>
                                <!-- article end -->
                                <!-- post nav -->
                                @php
                                $prev = \App\Http\Controllers\FrontController::GetPost(request()->segment(2) , 'prev');
                                $next = \App\Http\Controllers\FrontController::GetPost(request()->segment(2) , 'next');
                                @endphp
                                <div class="post-nav-wrap fl-wrap">
                                    @if($prev !== null)
                                    <a class="post-nav post-nav-prev" href="/blog/{{$prev->id}}"><span
                                            class="post-nav-img"><img src="{{$prev->PostImage}}"
                                                                      alt=""></span><span class="post-nav-text"><strong>پست قبلی</strong> <br>{{$prev->PostName}}</span></a>
                                    @endif

                                    <a class="post-nav post-nav-next" href="/blog/{{$next->id}}"><span
                                            class="post-nav-img"><img src="{{$next->PostImage}}"
                                                                      alt=""></span><span class="post-nav-text"><strong>پست بعدی</strong><br>{{$next->PostName}}</span></a>
                                </div>
                                <!-- post nav end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>نظرات - <span> 2 </span></h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item only-comments">
                                                <div class="review-comments-avatar">
                                                    <img src="../../../public/Frontassets/images/avatar/4.jpg" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text fl-wrap">
                                                    <div class="reviews-comments-header fl-wrap">
                                                        <h4><a href="#">لیزا رز</a></h4>
                                                    </div>
                                                    <p>" لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                                        استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                                                        نیاز. "</p>
                                                    <div class="reviews-comments-item-footer fl-wrap">
                                                        <div class="reviews-comments-item-date"><span><i
                                                                    class="far fa-calendar-check"></i>12 اسفند 1399</span>
                                                        </div>
                                                        <a href="#" class="reply-item">پاسخ</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item only-comments">
                                                <div class="review-comments-avatar">
                                                    <img src="../../../public/Frontassets/images/avatar/6.jpg" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text fl-wrap">
                                                    <div class="reviews-comments-header fl-wrap">
                                                        <h4><a href="#">آدام کونسی</a></h4>
                                                    </div>
                                                    <p>" لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                                        استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                                                        نیاز. "</p>
                                                    <div class="reviews-comments-item-footer fl-wrap">
                                                        <div class="reviews-comments-item-date"><span><i
                                                                    class="far fa-calendar-check"></i>12 اسفند 1399</span>
                                                        </div>
                                                        <a href="#" class="reply-item">پاسخ</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>ارسال نظرات</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form id="add-comment" class="add-comment  custom-form" name="rangeCalc">
                                            <fieldset>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label><i class="fal fa-user"></i></label>
                                                            <input type="text" placeholder="نام *" value=""/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><i class="fal fa-envelope"></i> </label>
                                                            <input type="text" placeholder="آدرس ایمیل*" value=""/>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" placeholder="نظر شما:"></textarea>
                                                    <div class="clearfix"></div>
                                                    <button class="btn  color2-bg  float-btn" style="margin-top:30px;">
                                                        ارسال <i class="fal fa-paper-plane"></i></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                </div>
                                <!-- list-single-main-item end -->
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
