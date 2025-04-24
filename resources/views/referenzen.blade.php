@extends('layout.main')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
            data-image-src="{{ $page->image }}" data-positionY="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light"
                            data-in-effect="fadeInDown">
                            {{ $page->title }} <small class="color-light alpha7">{!! $page->description !!}</small>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <div id="static_page" class="pt75 pb50">
        <div class="container">
            <div class="row">
                @foreach(json_decode($page->partners, true) as $partner)
                    <div class="col-md-3 col-sm-3 col-xs-3 mb25" style="min-height: 300px;">
                        <div class="desaturate" style="width: 100%; height: 200px; background:  #FFFFFF url('{{ $partner["attributes"]["logo"] }}') no-repeat center center;  background-size:150px; "></div>
                        <h5 class="font-montserrat mt10">
                            {{ $partner["attributes"]["name"] }}
                            <small><a href="{{ $partner["attributes"]["link"] }}" target="_blank">Webseite besuchen</a></small>
                        </h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
