@extends('layout.main')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    {{--        @if(isset($page->slider))--}}
    <!-- Intro Area ===================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($page->slider as $slide)
                <li data-target="#myCarousel"
                    data-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">

            @foreach($page->slider as $slide)
                @php(extract($slide['attributes']))
                <div class="item carousel-img {{ $loop->first ? 'active' : '' }}"
                     style="background-image: url('{{ $image }}'); background-position: center center;">
                    <div class="container">
                        <div class="carousel-caption text-left animated" data-animation="bounceInLeft"
                             data-animation-delay="100">
                            <h1 class="text-left text-capitalize color-light mt-50">
                                {{ $title }}
                            </h1>
                            <p class="color-light text-left mt20">
                            <span style="color:#222222;">
                                {{ $description }}
                            </span>

                                @if($button)
                                <br>
                                <a href="{{ $link }}"
                                   class="button button-md button-circle hover-ripple-out button-blue mt30">
                                    {{ $button }}
                                </a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span
                class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span
                class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    {{--        @endif--}}


    <!-- Welcome Area
    ===================================== -->
    <div id="welcome" class="pt75">
        <div class="container">
            <div class="row">

                <!-- title start -->
                <div class="col-md-12 text-center">
                    <h1 class="font-size-normal">
                        <small>Ihr kompetenter Partner rund um die gewerbliche und private Reinigung</small>
                        B&T Gebäudeservice – Alles Sauber <small class="heading heading-solid center-block"></small>
                    </h1>
                </div>
                <!-- title end -->

                <iframe width="100%" height="440" src="https://www.youtube.com/embed/4EhYIi6R_iA"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                <!-- title description start -->
                <div class="col-md-8 col-md-offset-2 text-center">
                    <p>
                        <span class="lead"><strong>Sauberkeit und Hygiene ist unsere Passion. Als Komplettdienstleister bieten wir Ihnen ein breites Servicespektrum rund um die Themen Reinigung, Sauberkeit, Hygiene und Saubere Umwelt. Verschaffen sie sich auf unserer Internetseite einen ersten Einblick in unsere Betätigungsfelder und unsere Firmenphilosophie. Und wenn Sie fragen haben, rufen Sie uns einfach an. Wir sind 7 Tage in der Woche für Sie da. Versprochen!</strong></span><br><br>

                        PERFEKTE SAUBERKEIT BIS IN ALLE ECKEN ERREICHEN WIR FÜR SIE MIT:<br><br>
                        • zuverlässigen, hoch motivierten und vertrauenswürdigen Mitarbeitern <br>
                        • regelmäßigen fachlichen Schulungen und Fortbildungen<br>
                        • modernen Reinigungsgeräten und –Mitteln<br>
                        • hohen Qualitätsansprüchen und besonderer Gründlichkeit
                    </p>
                </div>
                <!-- title description end -->
            </div>

            <div class="row mt50">

                <!-- item one start -->
                <div class="col-md-3 col-sm-6 col-xs-6 animated" data-animation="fadeInLeft"
                     data-animation-delay="100">
                    <div class="content-box content-box-center">
                        <span class="icon-focus color-pasific"></span>
                        <h5>Allgäu und Umkreis</h5>
                        <p></p>

                    </div>
                </div>
                <!-- item one end -->

                <!-- item two start -->
                <div class="col-md-3 col-sm-6 col-xs-6 animated" data-animation="fadeInLeft"
                     data-animation-delay="200">
                    <div class="content-box content-box-center">
                        <span class="icon-clock color-pasific"></span>
                        <h5>Immer Erreichbar</h5>
                        <p></p>

                    </div>
                </div>
                <!-- item two end -->

                <!-- item three start -->
                <div class="col-md-3 col-sm-6 col-xs-6 animated" data-animation="fadeInRight"
                     data-animation-delay="300">
                    <div class="content-box content-box-center">
                        <span class="icon-genius color-pasific"></span>
                        <h5>Flexibel </h5>
                        <p></p>

                    </div>
                </div>
                <!-- item three end -->

                <!-- item four start -->
                <div class="col-md-3 col-sm-6 col-xs-6 animated" data-animation="fadeInRight"
                     data-animation-delay="400">
                    <div class="content-box content-box-center">
                        <span class="icon-refresh color-pasific"></span>
                        <h5>Qualität </h5>
                        <p></p>

                    </div>
                </div>
                <!-- item four start -->

            </div>
        </div>
    </div>


    <div id="wea" class="pt75">
        <div class="container">
            <div class="row">


                <!-- title start -->
                <div class="col-md-12 text-center">
                    <h1 class="font-size-normal">
                        <small>...</small>
                        Unser Serviceangebot an Sie: <small class="heading heading-solid center-block"></small>
                    </h1>
                </div>
                <!-- title end -->

                <div class="row">
                    <div class="dt-sc-one-half first pull-left col-md-6">
                        <ul class="dt-sc-fancy-list dt-sc-icon-list arrow">
                            <li><img src="/assets/list-img1.png" alt="image"> Grundreinigung</li>
                            <li><img src="/assets/list-img2.png" alt="image"> Polsterreinigung</li>
                            <li><img src="/assets/list-img3.png" alt="image"> Teppichbodenreinigung</li>
                            <li><img src="/assets/list-img4.png" alt="image"> Unterhaltsreinigung</li>
                            <li><img src="/assets/list-img5.png" alt="image"> Gebäudereinigung</li>
                            <li><img src="/assets/list-img6.png" alt="image"> Bodensanierung</li>
                            <li><img src="/assets/list-img7.png" alt="image"> Glasreinigung</li>
                        </ul>
                    </div>

                    <div class="col-md-6 dt-sc-one-half pull-right">
                        <img src="/assets/cleaning-service777.png" class="img-responsive" alt="Service"
                             title="Service">
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Info Area
    ===================================== -->
    <div id="info-1" class="pt50 pb50 mt75 parallax-window" data-parallax="scroll" data-speed="0.5"
         data-image-src="/assets/img-bg-2.jpg">
        <div class="container">
            <div class="row pt75">
                <div class="col-md-12 text-center">
                    <h1 class="color-light">
                        <small class="color-light">Der beste Weg zum Erfolg sind Ordnung und Sauberkeit.</small>
                        Sind Sie bereit?
                    </h1>

                    <a class="button-o button-md button-green hover-fade mt25" href="/de/feedback/"><span
                            class="color-light">Kontaktieren Sie uns</span></a>
                </div>
            </div>
        </div>
    </div>


    <!-- Review Area
    ===================================== -->
    <style>.displaynone {
            display: none;
        }

        .success {
            color: #b2cc71;
            font-size: 25px;
        }</style>
    <div id="review_area" class="pt50 pb50">
        <h4>Bewertungen</h4>
        <div class="container">
            <div class="row pt75">
                <div class="col-md-12 text-center">
                    <div class="review-content">
                        <div class="review-user"><span>Natascha Drexel</span><br></div>
                        <p>Kompetente Beratung, Sauberkeit Top &#38; Allzeit Hilfsbereit. Werde euch aufjedenfall
                            weiter
                            empfehlen.</p>
                    </div>
                    <div class="review-content">
                        <div class="review-user"><span>Linda España </span><br></div>
                        <p>3 TATSACHEN :&#x29; ZUVERLÄSSIGKEIT, KOMPETENZ &#38; QUALITATIV HOCHWERTIGE ARBEIT
                            :&#x29; </p>
                    </div>
                    <div class="review-content">
                        <div class="review-user"><span>H. Fischer</span><br></div>
                        <p>Bin sehr zufrieden, hat alles gut geklappt. Gute Beratung, saubere Abwicklung, Reiningung
                            top. Nur weiter so. Wir werden Sie auf jeden Fall weiter empfehlen.</p>
                    </div>
                    <div class="review-content">
                        <div class="review-user"><span>Angela Schranz</span><br></div>
                        <p>Wie immer - sauber, hilfsbereit und stets zuverlässig. Macht jedes Mal Spaß mit euch zu
                            arbeiten.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
