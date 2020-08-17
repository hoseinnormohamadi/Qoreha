@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!--  section  -->
            <section class="parallax-section single-par" data-scrollax-parent="true">
                <div class="bg par-elem " data-bg="{{asset('Frontassets/images/bg/13.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay op7"></div>
                <div class="container">
                    <div class="section-title center-align big-title">
                        <h2><span>تماس با ما</span></h2>
                        <span class="section-separator"></span>
                    </div>
                </div>
                <div class="header-sec-link">
                    <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
                </div>
            </section>
            <!--  section  end-->
            <!--  section  -->
            <section id="sec1" data-scrollax-parent="true">
                <div class="container">
                    <!--about-wrap -->
                    <div class="about-wrap">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="ab_text-title fl-wrap">
                                    <h3>راه های تماس با ما</h3>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div>
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget">
                                        <div class="box-widget-content bwc-nopad">
                                            <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-map-marker"></i> آدرس :</span> <a  class="custom-scroll-link">{{\App\Site::find(1)->Address}}</a></li>
                                                    <li><span><i class="fal fa-phone"></i> تلفن :</span> <a href="tell:{{\App\Site::find(1)->PhoneNumber}}">{{\App\Site::find(1)->PhoneNumber}}</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> ایمیل :</span> <a href="mailto:{{\App\Site::find(1)->Email}}">{{\App\Site::find(1)->Email}}</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap" style="margin-top:20px;">
                                    <div class="banner-wdget fl-wrap">
                                        <div class="overlay op4"></div>
                                        <div class="bg" data-bg="images/bg/18.jpg"></div>

                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                            <div class="col-md-8">
                                <div class="ab_text">
                                    <div class="ab_text-title fl-wrap">
                                        <h3>یک پیام برای ما ارسال کنید</h3>
                                        <span class="section-separator fl-sec-sep"></span>
                                    </div>

                                    <div id="contact-form">
                                        <div id="message"></div>
                                        <form class="custom-form" method="post" action="/contact-us">
                                            @csrf
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" name="FirstName" id="FirstName" placeholder="نام شما *" value="" required />
                                                <div class="clearfix"></div>
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" name="LastName" id="LastName" placeholder="نام خانوادگی شما *" value="" required />
                                                <label><i class="fal fa-mail-bulk"></i></label>
                                                <input type="email" name="Email" id="Email" placeholder="ایمیل شما" value="" />
                                                <label><i class="fal fa-phone"></i></label>
                                                <input type="text" name="PhoneNumber" id="PhoneNumber" placeholder="شماره شما *" value="" required />
                                                 <textarea name="Text" id="Text" cols="40" rows="3" placeholder="پیام شما:"></textarea>
                                            <input type="submit" class="btn float-btn color2-bg" value="ارسال پیام">
                                        </form>
                                    </div>
                                    <!-- contact form  end-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- about-wrap end  -->
                </div>
            </section>

        </div>
        <!--content end-->
    </div>

@endsection
