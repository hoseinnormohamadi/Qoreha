@extends('Front.Layout')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">

            <div class="post-container fl-wrap">
                <div class="row">
                    <!-- blog content-->
                    <div class="col-md-8">
                        <section class="list-single-facts fl-wrap">
                            <div class="row">
                                @foreach($Category as $cat)
                                    <div class="col-md-3 margin-bottom-20">
                                        <!-- inline-facts  -->
                                        <a href="/Listing/{{request()->segment(2)}}/{{$cat->id}}" class="inline-facts-wrap gradient-bg ">
                                            <div class="inline-facts">
                                                <i class="fa fa-money-bill-wave"></i>
                                                <div class="fact-title">{{$cat->name}}</div>
                                            </div>
                                            <div class="stat-wave">
                                                <svg viewbox="0 0 100 25">
                                                    <path fill="#fff" d="M0 30 V12 Q30 6 55 12 T100 11 V30z"/>
                                                </svg>
                                            </div>
                                        </a>
                                        <!-- inline-facts end -->
                                    </div>
                                @endforeach
                            </div>

                        </section>


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
                                        <a href="{{$ad->Link}}" class="inline-facts-wrap gradient-bg" style="background: url('{{$ad->Image}}') no-repeat center; background-size: contain;">
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
