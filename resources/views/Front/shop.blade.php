@extends('Front.Layout')
@section('head')
    <link rel="stylesheet" href="{{asset('Frontassets/css/shop.css')}}">
@endsection
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!--  section  -->
            <!--  section  end-->
            <section class="gray-bg small-padding no-top-padding-sec" id="sec1">
                <div class="container">
                    <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                        <a href="/">خانه</a><span>فروشگاه</span>
                    </div>
                    <div class="mob-nav-content-btn  color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>  فیلترها</div>
                    <div class="fl-wrap">
                        <div class="row">
                            @foreach($Shop as $shop)

                            <div class="col-md-4">
                                <!-- list-main-wrap-header-->
                                <!-- list-main-wrap-header end-->
                                <!-- listing-item-container -->
                                <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                    <!-- shop-item  -->
                                    <div class="shop-item">
                                        <div class="shop-item-media">
                                            <a href="{{route('ShopSingle' , $shop->id)}}">
                                                <img src="{{$shop->Image}}" alt="">
                                                <div class="overlay"></div>
                                            </a>

                                        </div>
                                        <div class="shop-item_title">
                                            <h4><a href="{{route('ShopSingle' , $shop->id)}}">{{$shop->Name}}</a></h4>
                                            <span class="shop-item_price">{{  number_format($shop->Price, 0, ',', ',')}}  تومان</span>
                                            <a href="{{route('ShopSingle' , $shop->id)}}" class="shop-item_link color-bg">جزئیات</a>
                                        </div>
                                    </div>
                                    <!-- shop-item end -->
                                    <!-- shop-item end -->

                                </div>
                                <!-- listing-item-container end -->
                            </div>
                            @endforeach

                        </div>
                        <div class="pagination fwmpag">
                            {!! $Shop->links("pagination::Front") !!}

                        </div>
                    </div>
                </div>
            </section>
            <!--section end-->
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
        <!--cart  -->

        <!--cart end-->
    </div>

@endsection
