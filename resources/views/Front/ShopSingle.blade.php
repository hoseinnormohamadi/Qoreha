@extends('Front.Layout')
@section('head')
    <link rel="stylesheet" href="{{asset('Frontassets/css/shop.css')}}">

@endsection
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!--section-->
            <section class="gray-bg small-padding no-top-padding-sec" id="sec1">
                <div class="container">
                    <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                        <a href="/">خانه</a><a href="/Shop">فروشگاه</a><span>{{$Product->Name}}</span>
                    </div>

                    <div class="fl-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fl-wrap block_box product-header">
                                    <div class="product-header-details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-slider-wrap shop-media-img">
                                                            <div class="swiper-wrapper lightgallery">
                                                                <div class="swiper-slide hov_zoom"><img src="{{$Product->Image}}" alt=""><a href="{{$Product->Image}}" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                            </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h3>{{$Product->Name}}</h3>
                                                <span class="product-header-details_price">{{  number_format($Product->Price, 0, ',', ',')}}  تومان</span>

                                                <span class="fw-separator"></span>
                                                <div class="clearfix"></div>
                                                <p>{!! $Product->Description !!}</p>
                                                <span class="fw-separator"></span>
                                                <div class="custom-form product-header_form ">

                                                    <button class="color-bg">برای خرید تماس بگیرید</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- shop-tabs-->
                                <div class="tabs-act fl-wrap">
                                    <div class="shop-tabs-menu " id="st-menu">
                                        <ul class="tabs-menu fl-wrap no-list-style">
                                            <li class="current"><a href="#shop-tab1"> توضیحات</a></li>
                                            <li><a href="#shop-tab2">اطلاعات اضافی</a></li>
                                        </ul>
                                    </div>
                                    <!-- shop-tabs-->
                                    <!-- shop-tabs-->
                                    <div class="shop-tabs fl-wrap block_box">
                                        <!--tabs -->
                                        <div class="tabs-container fl-wrap">
                                            <!--tab -->
                                            <div class="tab">
                                                <div id="shop-tab1" class="tab-content  first-tab ">
                                                    <div class="shop-tab-container">
                                                        <p>{!! $Product->Description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--tab end-->
                                            <!--tab -->
                                            <div class="tab">
                                                <div id="shop-tab2" class="tab-content">
                                                    <div class="shop-tab-container">
                                                        <ul class="no-list-style shop-list fl-wrap">
                                                            @if($Product->Color != null)
                                                                <li><span>رنگ محصول :</span> {{$Product->Color}}  </li>
                                                            @endif
                                                            @if($Product->Capacity != null)
                                                                <li><span>ظرفیت محصول :</span>{{$Product->Capacity}}</li>
                                                            @endif
                                                            @if($Product->Height != null)
                                                                <li><span>ارتفاع محصول :</span>{{$Product->Height}}</li>
                                                            @endif
                                                            @if($Product->Size != null)
                                                                <li><span>سایز محصول :</span>{{$Product->Size}}</li>
                                                            @endif
                                                            @if($Product->Weight != null)
                                                                <li><span>طول محصول :</span>{{$Product->Weight}}</li>
                                                            @endif
                                                            @if($Product->Diameter != null)
                                                                <li><span>قطر محصول :</span>{{$Product->Diameter}}</li>
                                                            @endif
                                                            @if($Product->Price != null)
                                                                <li><span>قیمت محصول :</span>{{$Product->Price}}</li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--tab end-->
                                            <!--tab -->
                                        </div>
                                        <!--tab end-->
                                    </div>
                                    <!--tabs end-->
                                </div>
                                <!-- shop-tabs end-->
                                <!-- list-single-main-item -->
                                <!-- list-single-main-item end -->
                            </div>
                        </div>
                    </div>
            </section>
            <!--section end-->
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
        <!--cart  -->
        <div class="show-cart color2-bg"><i class="far fa-shopping-cart"></i><span>3</span></div>
        <div class="cart-overlay"></div>
        <div class="cart-modal">
            <div class="cart-modal-wrap fl-wrap">
                <span class="close-cart color2-bg">بستن <i class="fal fa-times"></i> </span>
                <h3>سبد خرید شما</h3>
                <div class="clear-cart"> <span class="tolt" data-microtip-position="left" data-tooltip="حذف همه"><i class="fal fa-trash-alt"></i></span></div>
                <ul class="cart-modal-list no-list-style fl-wrap">
                    <li>
                        <a class="cart-modal-image" href="product-single.html">
                            <img src="images/shop/4.jpg" alt="">
                        </a>
                        <div class="cart-modal-det">
                            <a href="product-single.html">فیله کباب شده</a>
                            <div class="quantity"><span>1</span> x <span class="woocommerce-Price-amount">56.000 تومان</span></div>
                        </div>
                        <a href="#" class="remove"><i class="fal fa-times-circle"></i></a>
                    </li>
                    <li>
                        <a class="cart-modal-image" href="product-single.html">
                            <img src="images/shop/2.jpg" alt="">
                        </a>
                        <div class="cart-modal-det">
                            <a href="product-single.html">بزهای سفید و ترد</a>
                            <div class="quantity"><span>1</span> x <span class="woocommerce-Price-amount">17.000 تومان</span></div>
                        </div>
                        <a href="#" class="remove"><i class="fal fa-times-circle"></i></a>
                    </li>
                    <li>
                        <a class="cart-modal-image" href="product-single.html">
                            <img src="images/shop/3.jpg" alt="">
                        </a>
                        <div class="cart-modal-det">
                            <a href="product-single.html">پودینگ شکلات گرم</a>
                            <div class="quantity"><span>2</span> x <span class="woocommerce-Price-amount">90.000 تومان</span></div>
                        </div>
                        <a href="#" class="remove"><i class="fal fa-times-circle"></i></a>
                    </li>
                </ul>
                <div class="cart-modal-total fl-wrap">
                    <span  class="cart-modal-total-title">جمع</span> <span class="woocommerce-Price-amount">253.000 تومان</span>
                </div>
                <div class="cart-sb_footer fl-wrap">
                    <a href="cart.html" class="cart_btn  color2-bg">سبد خرید</a>
                    <a href="#" class="cart_btn  color-bg">بررسی</a>
                </div>
            </div>
        </div>
        <!--cart end-->
    </div>
@endsection
