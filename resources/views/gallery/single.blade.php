@extends('layout.main')

@include('layout.utils.meta-tags', [
    'title' => $gallery->meta_title ?: $gallery->title,
    'description' => $gallery->meta_description,
    'keywords' => $gallery->meta_keywords,
    'image' => $gallery->meta_image,
])

@section('content')
    <!-- Intro Area
        ===================================== -->
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="{{ asset('/img/_T4A0518-1.jpg') }}" data-positionY="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                            {{ $gallery->title }}
                            <small class="color-light alpha7">
                                {{ $gallery->content }}
                            </small>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>


    <!-- gallery Area
            ===================================== -->
    <div id="portfolioMasonry" class="pt35">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb50">

                    <div class="portfolio-masonry-one">

                        @foreach($gallery->gallery_images as $image)
                            <!-- gallery item start -->

                        <div class="portfolio-masonry-one-item width2 woocommerce ">

                            <div class="portfolio-mask text-center">
                                <h6></h6>
                                <p><a href=""></a></p>
                                <div class="portfolio-mask-attr text-center">

                                    <a href="{{ $image }}" class="magnific-popup" title=""><i class="fa fa-search-plus"></i>  </a>

                                </div>

                            </div>

                            <img src="{{ $image }}" alt="" class="img-responsive">

                        </div>

                        <!-- gallery item end -->
                        @endforeach

                    </div>

                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- section gallery end -->
@endsection
