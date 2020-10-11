@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
                <div class="bg-parallax-wrap">
                    <div class="bg par-elem " data-bg="{{asset($wwal->Image)}}"
                         data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                </div>
                <div class="container">
                    <div class="list-single-header-item  fl-wrap">
                        <div class="row">
                            <div class="col-md-9">
                                <h1>{{$wwal->Name}}</h1>
                                <div class="geodir-category-location fl-wrap">
                                    <a href="#"><i class="fas fa-map-marker-alt"></i> {{$wwal->User->Address}}</a>
                                    <a href="#"> <i class="fal fa-phone"></i>{{$wwal->User->PhoneNumber}}</a> <a
                                        href="#"><i class="fal fa-envelope"></i> {{$wwal->User->email}}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="list-single-header_bottom fl-wrap">
                        <a class="listing-item-category-wrap" href="#">
                            <div class="listing-item-category  red-bg"><i class="fal fa-cheeseburger"></i></div>
                            <span>{{$wwal->Categori->name}}</span>
                        </a>
                        <div class="list-single-author"><a><span class="author_avatar"> <img alt=''
                                                                                             src='{{$wwal->User->ProfileImage}}'>  </span>توسط {{$wwal->User->FirstName .' ' . $wwal->User->LastName}}
                            </a></div>
                        <div class="geodir_status_date gsd_open"><i
                                class="fal fa-lock-open"></i>{{\Hekmatinasser\Verta\Verta::instance($wwal->created_at)->format('d F Y')}}
                        </div>
                        <!-- <div class="list-single-stats">
                            <ul class="no-list-style">
                                <li><span class="viewed-counter"><i class="fas fa-eye"></i> بازدید -  156 </span></li>
                                <li><span class="bookmark-counter"><i class="fas fa-heart"></i> نشانک -  24 </span></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </section>
            <!-- scroll-nav-wrapper-->
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul class="no-list-style">
                            <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> بالا</a></li>
                            <li><a href="#sec2"><i class="fal fa-info"></i>جزئیات</a></li>

                            <li><a href="#sec5"><i class="fal fa-comments-alt"></i>بررسی ها</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
            <!-- scroll-nav-wrapper end-->
            <section class="gray-bg no-top-padding">
                <div class="container">

                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- list-single-main-wrapper-col -->
                        <div class="col-md-8">
                            <!-- list-single-main-wrapper -->
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="list-single-main-media fl-wrap">
                                    <img src="{{$wwal->LotteryImage}}" class="respimg" alt="">
                                </div>
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>توضیحات</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        {!! $wwal->LotteryContent !!}
                                    </div>
                                </div>

                                <div class="list-single-main-item fl-wrap block_box" id="sec5">
                                    <div class="list-single-main-item-title">
                                        <h3>بررسی موارد - <span> {{\App\Comments::where('ParentID' , $wwal->id)->where('Type' , 'Lottery')->count()}} </span></h3>
                                    </div>
                                    <!--reviews-score-wrap-->

                                    <!-- reviews-score-wrap end -->
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            @foreach(\App\Comments::where('ParentID' , $wwal->id)->where('Type' , 'Lottery')->get() as $Comment)
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="{{$Comment->User->ProfileImage}}" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text fl-wrap">
                                                    <div class="reviews-comments-header fl-wrap">
                                                        <h4><a href="#">{{$Comment->User->FirstName .' ' . $Comment->User->LastName}}</a></h4>

                                                    </div>
                                                    <div style="width: 250px">
                                                        <p style=" word-break: break-all;">{{$Comment->Text}}</p>
                                                    </div>
                                                    <div class="reviews-comments-item-footer fl-wrap">
                                                        <div class="reviews-comments-item-date"><span><i
                                                                    class="far fa-calendar-check"></i>{{\Hekmatinasser\Verta\Verta::instance($Comment->created_at)->format('d F Y')}}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec6">

                                @if(Auth::check())
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>ارسال بررسی</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form class="add-comment  custom-form" action="{{route('CommentStore')}}" method="post">
                                            @csrf
                                            <fieldset>
                                                <input type="hidden" name="Type" value="Wwal">
                                                <input type="hidden" name="ParentID" value="{{$wwal->id}}">
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label><i class="fal fa-user"></i></label>
                                                            <input type="text" value="{{Auth::user()->Username}}"
                                                                   disabled/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><i class="fal fa-envelope"></i> </label>
                                                            <input type="text" value="{{Auth::user()->email}}"
                                                                   disabled/>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" placeholder="نظر شما:"
                                                              name="Text">{{old('Text')}}</textarea>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <button class="btn  color2-bg  float-btn" type="submit">ارسال <i
                                                            class="fal fa-paper-plane"></i></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                @else
                                        <div class="list-single-main-item-title fl-wrap">
                                            <h3>برای ارسال بررسی وارد حساب کاربری خود شوید</h3>
                                        </div>
                                    @endif

                                </div>
                                <!-- list-single-main-item end -->
                            </div>
                        </div>
                        <!-- list-single-main-wrapper-col end -->
                        <!-- list-single-sidebar -->
                        <div class="col-md-4">
                            <!--box-widget-item -->
                            <!-- <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>ساعات کاری</h3>
                                </div>
                                <div class="box-widget opening-hours fl-wrap">
                                    <div class="box-widget-content">
                                        <ul class="no-list-style">
                                            <li class="mon"><span class="opening-hours-day">شنبه </span><span class="opening-hours-time">9 - 21</span></li>
                                            <li class="tue"><span class="opening-hours-day">یک‌شنبه </span><span class="opening-hours-time">9 - 21</span></li>
                                            <li class="wed"><span class="opening-hours-day">دوشنبه </span><span class="opening-hours-time">9 - 21</span></li>
                                            <li class="thu"><span class="opening-hours-day">سه‌شنبه </span><span class="opening-hours-time">9 - 21</span></li>
                                            <li class="fri"><span class="opening-hours-day">چهارشنبه </span><span class="opening-hours-time">9 - 21</span></li>
                                            <li class="sat"><span class="opening-hours-day">پنج‌شنبه </span><span class="opening-hours-time">9 - 19</span></li>
                                            <li class="sun"><span class="opening-hours-day">جمعه </span><span class="opening-hours-time">بسته</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <!-- <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>رزرو میز</h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <form class="add-comment custom-form">
                                            <fieldset>
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" placeholder="نام *" value="" />
                                                <div class="clearfix"></div>
                                                <label><i class="fal fa-envelope"></i>  </label>
                                                <input type="text" placeholder="آدرس ایمیل*" value="" />
                                                <div class="quantity fl-wrap">
                                                    <span><i class="fal fa-user-plus"></i>تعداد : </span>
                                                    <div class="quantity-item">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" name="quantity" title="Qty" class="qty color-bg" data-min="1" data-max="3" data-step="1" value="1">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </div>
                                                <div class="listsearch-input-item clact date-container2">
                                                    <label><i class="fal fa-calendar"></i></label>
                                                    <input type="text" placeholder="تاریخ" name="datepicker-here-time" value="" />
                                                    <span class="clear-singleinput"><i class="fal fa-times"></i></span>
                                                </div>
                                                <textarea cols="40" rows="3" placeholder="اطلاعات اضافی:"></textarea>
                                            </fieldset>
                                            <button class="btn color2-bg url_btn float-btn" onclick="window.location.href='booking.html'">رزرو میز <i class="fal fa-bookmark"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>موقعیت / تماس </h3>
                                </div>
                                <div class="box-widget">
                                    <!-- <div class="map-container">
                                        <div id="singleMap" data-latitude="35.725705" data-longitude="51.408263" data-mapTitle="Our Location"></div>
                                    </div> -->
                                    <div class="box-widget-content bwc-nopad">
                                        <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                            <ul class="no-list-style">
                                                <li><span><i
                                                            class="fal fa-map-marker"></i> آدرس :</span> {{$wwal->User->Address}}
                                                </li>
                                                <li><span><i class="fal fa-phone"></i> تلفن :</span> <a
                                                        href="tell:{{$wwal->User->PhoneNumber}}">{{$wwal->User->PhoneNumber}}</a>
                                                </li>
                                                <li><span><i class="fal fa-envelope"></i> ایمیل :</span> <a
                                                        href="mailto:{{$wwal->User->email}}">{{$wwal->User->email}}</a>
                                                </li>
                                                @if($wwal->WebSite != null)
                                                    <li><span><i class="fal fa-browser"></i> سایت :</span> <a
                                                            href="{{$wwal->WebSite}}">{{$wwal->WebSite}}</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                        <!-- <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                            <ul class="no-list-style">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                            <div class="bottom-bcw-box_link"><a href="#" class="show-single-contactform tolt" data-microtip-position="top" data-tooltip="ارسال پیام"><i class="fal fa-envelope"></i></a></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <!-- <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3> حدود قیمت </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <div class="claim-price-wdget fl-wrap">
                                            <div class="claim-price-wdget-content fl-wrap">
                                                <div class="pricerange fl-wrap"><span>قیمت : </span> 81.000 تومان - 320 تومان </div>
                                                <div class="claim-widget-link fl-wrap"><span>مال خودت هست یا اینجا کار میکنی؟</span><a href="#">اکنون ادعا کنید!</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <!-- <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3> اینستاگرام </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <div class='jr-insta-thumb' id="insta-content" data-instatoken="3075034521.5d9aa6a.284ff8339f694dbfac8f265bf3e93c8a"></div>
                                    </div>
                                </div>
                            </div> -->
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <!-- <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>ارسال شده توسط : </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-author fl-wrap">
                                        <div class="box-widget-author-title">
                                            <div class="box-widget-author-title-img">
                                                <img src="images/avatar/5.jpg" alt="">
                                            </div>
                                            <div class="box-widget-author-title_content">
                                                <a href="user-single.html">آلیسا نوری</a>
                                                <span>4 مکان تبلیغ شده</span>
                                            </div>
                                            <div class="box-widget-author-title_opt">
                                                <a href="user-single.html" class="tolt green-bg" data-microtip-position="top" data-tooltip="مشاهده پروفایل"><i class="fas fa-user"></i></a>
                                                <a href="#" class="tolt color-bg cwb" data-microtip-position="top" data-tooltip="گپ و گفتگو با مالک"><i class="fas fa-comments-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>قرعه کشی های مشابه :</h3>
                                </div>
                                <div class="box-widget  fl-wrap">
                                    <div class="box-widget-content">
                                        <!--widget-posts-->
                                        <div class="widget-posts  fl-wrap">
                                            <ul class="no-list-style">
                                                @foreach(\App\Http\Controllers\FrontController::LikeThiswwal($wwal->Category) as $lottery)
                                                    <li>
                                                        <div class="widget-posts-img">
                                                            <a href="/wwal/{{$lottery->id}}"><img
                                                                    src="{{$lottery->Image}}" alt=""></a>
                                                        </div>
                                                        <div class="widget-posts-descr">
                                                            <h4>
                                                                <a href="/wwal/{{$lottery->id}}">{{$lottery->Name}}</a>
                                                            </h4>
                                                            <div class="geodir-category-content fl-wrap">
                                                                <a>{!! Str::limit($lottery->Content, 30) !!}</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- widget-posts end-->
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <!-- <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>برچسب ها</h3>
                                </div>
                                <div class="box-widget opening-hours fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="list-single-tags tags-stylwrap">
                                            <a href="#">هتل</a>
                                            <a href="#">خوابگاه</a>
                                            <a href="#">اتاق</a>
                                            <a href="#">آبگرم</a>
                                            <a href="#">رستوران</a>
                                            <a href="#">پارکینگ</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--box-widget-item end -->
                        </div>
                        <!-- list-single-sidebar end -->
                    </div>
                </div>
            </section>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>

@endsection
