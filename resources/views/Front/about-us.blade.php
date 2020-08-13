@extends('Front.layout2')
@section('content')
    <section class="about-us-main-section">
        <div class="container">
            <div class="row padding-top-bottom-15  about-each-row">
                <div class="col-12 about-us-title"> درباره ما </div>
                <div class="col-12 about-us-text">
                    {{$About}}
                </div>
            </div>
        </div>
    </section>

@endsection
