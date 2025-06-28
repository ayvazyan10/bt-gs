@extends('layout.main')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
            style="background-color: #9ab4bd"
            data-image-src="https://via.placeholder.com/1920x640.png/006688?text=Auto+Generated+Image+-+ipsum" data-positionY="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light"
                            data-in-effect="fadeInDown">
                            {{ $page->title }} <small class="color-light alpha7">...</small>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <div id="static_page" class="pt75 pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($page->slug == 'preise')
                        <iframe src="https://form.typeform.com/to/vfzsFdX2"
                                width="100%" height="600" frameborder="0"></iframe>
                    @else
                        {!! $page->content !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
