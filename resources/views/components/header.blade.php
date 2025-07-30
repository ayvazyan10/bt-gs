<!-- Page Loader
        ===================================== -->
<div id="pageloader">
    <div class="loader-item">
        <img src="/assets/puff.svg" alt="page loader">
    </div>
</div>

<a href="#page-top" class="go-to-top">
    <i class="fa fa-long-arrow-up"></i>
</a>


<!-- Navigation Area
===================================== -->
<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="/">
                <img src="/img/B&T_logo_page4_maxres.png" height="90" alt="bt-logo">
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="/" class="color-light">Startseite </a>
                @foreach($page_menus as $item)
                    @if($loop->last)
                        <li class=""><a href="{{ route('galerie') }}" class="color-light">Galerie</a></li>
                        <li class=""><a href="{{ route('referenzen') }}" class="color-light">Referenzen</a></li>
                    @endif
                    <li class=""><a href="{{ route('page', ['slug' => $item->slug]) }}" class="color-light">{{ $item->title }}</a></li>
                    @if($loop->last)
                        <li class=""><a href="{{ route('feedback') }}" class="color-light">Kontakt</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
