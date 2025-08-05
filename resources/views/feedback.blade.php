@extends('layout.main')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
            data-image-src="/assets/bg-parallax-5.jpg" data-positiony="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light"
                            data-in-effect="fadeInDown">{{ $page->title }}</h1>
                        <h4 class="brand-heading font-montserrat text-uppercase color-light alpha8"
                            data-in-effect="fadeInDown"></h4>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="shop-info" class="bg-grad-stellar">
        <div class="container">
            <br>
            <h3 style="color: #f5f5f5; text-decoration: underline;">Immenstadt</h3>
            <div class="row pt50 pb30">

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-flag color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('im_adresse')  }}</h5>
                        <p class="color-light alpha7">adresse</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-mobile color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('im_telefon')  }}</h5>
                        <p class="color-light alpha7">telefon</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-mobile color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('im_fax')  }}</h5>
                        <p class="color-light alpha7">telefon</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-chat color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('im_email')  }}</h5>
                        <p class="color-light alpha7">email</p>
                    </div>
                </div>


            </div>

            <h3 style="color: #f5f5f5; text-decoration: underline;">Mannheim</h3>

            <div class="row pt50 pb30">

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-flag color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('man_adresse') }}</h5>
                        <p class="color-light alpha7">adresse</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-mobile color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('man_telefon') }}</h5>
                        <p class="color-light alpha7">telefon</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-printer color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('man_fax') }}</h5>
                        <p class="color-light alpha7">fax</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content-box content-box-center">
                        <span class="icon-chat color-light"></span>
                        <h5 class="color-light">{{ nova_get_setting('man_email') }}</h5>
                        <p class="color-light alpha7">email</p></div>
                </div>


            </div>

        </div>
    </div>

    <div id="service" class="pt25 pb25">
        <div class="container">

            <div class="row mt50">
                <div class="col-md-6">
                    <iframe src="{{ nova_get_setting('map_url')  }}" width="100%" height="575" frameborder="0"
                            style="border:0" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-5">

                    <h3 class="font-size-normal">
                        <small class="color-primary">...</small>
                        Jetzt Anfragen</h3>

                    <div class="container-fluid bg-gray pt20 pb20 pr30 pl30">
                        <div class="row">

                            <form id="contactForm"
                                  method="POST"
                                  action="{{ route('kontakt.send') }}"
                                  class="positioned">
                                @csrf
                                {!! RecaptchaV3::field('contactform') !!}

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Vollständiger Name</label>
                                    <input type="text"
                                           name="senderName"
                                           value="{{ old('senderName') }}"
                                           class="form-control">
                                    @error('senderName')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>E-Mail-Adresse</label>
                                    <input type="email"
                                           name="senderEmail"
                                           value="{{ old('senderEmail') }}"
                                           class="form-control">
                                    @error('senderEmail')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Ihre Nachricht</label>
                                    <textarea name="message"
                                              rows="4"
                                              class="form-control">{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Sicherheitsfrage: 8 + 11 = ?</label>
                                    <input type="text"
                                           name="senderHuman"
                                           value="{{ old('senderHuman') }}"
                                           class="form-control">
                                    <input type="hidden" name="checkHuman_a" value="8">
                                    <input type="hidden" name="checkHuman_b" value="11">
                                    @error('senderHuman')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                            onclick="dataLayer.push({ event: 'contactFormClick' })"
                                            class="btn btn-primary btn-block">
                                        Nachricht senden
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
