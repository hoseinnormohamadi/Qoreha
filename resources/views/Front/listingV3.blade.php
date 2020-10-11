@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">

            <div class="post-container container-fluid fl-wrap">
                <div class="row">
                    <!-- blog content-->
                    <div class="col-md-8">
                        <section class="list-single-facts fl-wrap">
                            <div class="row">
                                <ul class="no-list-style">
                                    @foreach($Category as $cat)

                                        <li style="display: flex;" class="margin-bottom-20">
                                            <div class="widget-posts-img">
                                                <a href="/ListingLotterys/{{request()->segments()[1]}}/{{$cat->id}}">
                                                    <img src="{{asset(asset($cat->Image))}}" alt=""
                                                         style="width: 100px">
                                                </a>
                                            </div>
                                            <div class="widget-posts-descr">
                                                <h4>
                                                    <a href="/ListingLotterys/{{request()->segments()[1]}}/{{$cat->id}}">{{$cat->name}}</a>
                                                </h4>
                                            </div>
                                        </li>


                                    @endforeach
                                </ul>
                            </div>

                        </section>



                        {{--<section>
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
                                                        <input type="text" placeholder="نام *" value="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-envelope"></i> </label>
                                                        <input type="text" placeholder="آدرس ایمیل*" value="">
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
                        </section>--}}

                    </div>
                    <!-- blog conten end-->
                    <!-- blog sidebar -->
                    <div class="col-md-4">
                        <section>
                            @php
                                $Ad = \App\Ads::where('Status','Active')->inRandomOrder()->limit(3)->get();
                            @endphp
                            <div class="box-widget-wrap fl-wrap fixed-bar">

                                @foreach($Ad as $ad)
                                    <div class="col-md-12 margin-bottom-20">
                                        <a href="{{$ad->Link}}" class="inline-facts-wrap gradient-bg"
                                           style="background: url('{{$ad->Image}}') no-repeat center; background-size: contain;">
                                            <div class="inline-facts">
                                                <div class="fact-title"></div>
                                            </div>

                                        </a>
                                    </div>
                                @endforeach


                            </div>

                        </section>
                    </div>
                    <!-- blog sidebar end -->
                </div>
            </div>

        </div>


        <!--content end-->
    </div>

@endsection
