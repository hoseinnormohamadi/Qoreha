@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">

            <div class="col-list-wrap novis_to-top">

                <div class="clearfix"></div>
                <div class="container">
                    <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search fl-wrap"><i
                            class="fal fa-filter"></i> فیلترها
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- listsearch-input-wrap-->
                <div class="listsearch-input-wrap lws_mobile fl-wrap tabs-act" id="lisfw">
                    <div class="listsearch-input-wrap_contrl fl-wrap">
                        <div class="container">

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="container">
                        <!--tabs -->
                        <div class="tabs-container fl-wrap">
                            <!--tab -->
                            <div class="tab">
                                <div id="filters-search" class="tab-content  first-tab ">
                                    <div class="fl-wrap">
                                        <div class="row">
                                            <form method="get" action="/Search">
                                                <!-- listsearch-input-item-->
                                                <div class="col-md-9">
                                                    <div class="listsearch-input-item">
                                                        <span class="iconn-dec"><i class="far fa-bookmark"></i></span>
                                                        <input type="text" name="Key"
                                                               placeholder="دنبال چی میگردی ؟    "
                                                               value="@if(request('Key') !== null){{request('Key')}}@endif"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="listsearch-input-item">
                                                        <input type="submit" value="جست و جو"
                                                               class="header-search-button color-bg">
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- listsearch-input-item end-->
                                        </div>
                                        <!-- <div class="more-filter-option-wrap">
                                            <div class="more-filter-option-btn act-hiddenpanel"><i class="far fa-plus"></i> <span>گزینه های بیشتر</span></div>
                                            <div class="clear-filter-btn color"><i class="far fa-redo"></i> تنظیم مجدد </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!--tab end-->

                        </div>
                        <!--tabs end-->
                    </div>
                </div>
                <!-- listsearch-input-wrap end-->
                <!-- listing-item-container -->
                <div class="listing-item-container init-grid-items fl-wrap">
                    <div class="container">
                        <!-- listing-item  -->
                        @foreach($Lotterys as $lottery)
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <a href="/Lottery/{{$lottery->id}}" class="geodir-category-img-wrap fl-wrap">
                                            <img src="{{$lottery->LotteryImage}}" alt="">
                                        </a>
                                        <div class="listing-avatar">
                                            <a href="author-single.html"><img
                                                    src="{{$lottery->User->ProfileImage}}" alt=""></a>
                                            <span class="avatar-tooltip">اضافه شده توسط  <strong>{{$lottery->User->FirstName .' ' . $lottery->User->LastName}}</strong></span>
                                        </div>
                                        <div class="geodir_status_date color-bg">{{\Hekmatinasser\Verta\Verta::instance($lottery->created_at)->format('d F Y')}}</div>

                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a href="/Lottery/{{$lottery->id}}">{{$lottery->LotteryTitle}}</a></h3>
                                                {{--<div class="geodir-category-location fl-wrap"><a href="#2"
                                                                                                 class="map-item"><i
                                                            class="fas fa-map-marker-alt"></i> ایران , تهران , زعفرانیه</a>
                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">{!! Str::limit($lottery->LotteryContent, 130) !!}</p>

                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <!-- <div class="listing-item-category purp-bg"><i class="fal fa-cocktail"></i></div> -->
                                                <span>{{$lottery->Categori->name}}</span>

                                            </a>
                                            <div class="geodir-opt-list">
                                                <a href="listing.html" class="btn  dec_btn  color2-bg">ادامه مطلب<i
                                                        class="fal fa-arrow-alt-left"></i></a>

                                            </div>
                                            <!-- <div class="price-level geodir-category_price">
                                                <span class="price-level-item" data-pricerating="4"></span>
                                                <span class="price-name-tooltip">خیلی زیاد</span>
                                            </div> -->
                                            <div class="geodir-category_contacts">
                                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-phone"></i> تماس : </span><a href="#">021-1234567</a>
                                                    </li>
                                                    <li><span><i class="fal fa-envelope"></i> ایمیل : </span><a
                                                            href="#">yourmail@domain.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                    @endforeach
                    <!-- listing-item end -->



                        <div class="pagination">
                            {!! $Lotterys->links("pagination::Front") !!}
                        </div>
                    </div>
                </div>
                <!-- listing-item-container end -->
                <!-- <div class="avatar-img" data-srcav="http://citybook.kwst.net/images/avatar/4.jpg"></div> -->
            </div>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>

@endsection
