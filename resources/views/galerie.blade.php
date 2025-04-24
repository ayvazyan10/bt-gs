@extends('layout.main')

@include('layout.utils.meta-tags', [
    'title' => 'GALERIE',
])

@section('content')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
            data-image-src="{{ asset('/img/_T4A0518-1.jpg') }}" data-positionY="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light"
                            data-in-effect="fadeInDown">
                            GALERIE
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- gallery Area
        ===================================== -->
    <div id="clients_page" class="pt75 pb75">
        <div class="container">
            <div class="row">

                @foreach($galleries as $gallery)
                    <div class="col-md-3 col-sm-3 col-xs-3 mb25" style="min-height: 300px;">
                        <div class="desaturate" style="width: 100%; height: 200px; background:  #FFFFFF url('{{ $gallery->image }}') no-repeat center center;  background-size:200px; "></div>
                        <h5 class="font-montserrat mt10" style="background: #EEEEEE;padding: 10px;">
                            <a href="{{ route('gallery.show', ['id' => $gallery->id]) }}">
                                {{ $gallery->title }}
                            </a>
                            <small>{{ $gallery->content }}</small>
                        </h5>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
