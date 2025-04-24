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

                            <form name="contactform" id="contactForm" method="post"
                                  action="/backend/ajax/frontend/core.php" class="positioned">
                                <div class="col-md-12">


                                    <div class="form-group">
                                        <label>vollständiger Name</label>
                                        <input type="text" class="input-md input-rounded form-control" name="senderName"
                                               id="senderName" placeholder="" maxlength="100">
                                    </div>

                                    <div class="form-group">
                                        <label>E-Mail-Addresse</label>
                                        <input type="text" class="input-md input-rounded form-control"
                                               name="senderEmail" id="senderEmail" placeholder="" maxlength="100">
                                    </div>


                                    <div class="form-group">
                                        <label>Ihre Nachricht </label>
                                        <textarea class="form-control" rows="4" name="message" id="message"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>captcha</label>
                                        <input type="text" class="input-md input-rounded form-control"
                                               name="senderHuman" id="senderHuman" placeholder="8 + 11 = ?"
                                               maxlength="100">
                                        <input type="hidden" name="checkHuman_a" id="checkHuman_a" value="8">
                                        <input type="hidden" name="checkHuman_b" id="checkHuman_b" value="11">
                                    </div>

                                    <div class="form-group">
                                        <button name="sendMessage" id="sendMessage"
                                                class="button-o button-md button-rounded button-block button-blue hover-bounce-to-right">
                                            Nachricht senden
                                        </button>
                                    </div>

                                    <div id="sendingMessage" class="statusMessage sending-message"><p>Sending your
                                            message. Please wait...</p></div>
                                    <div id="successMessage" class="statusMessage success-message"><p>Thanks for sending
                                            your message! We'll get back to you shortly.</p></div>
                                    <div id="failureMessage" class="statusMessage failure-message"><p>There was a
                                            problem sending your message. Please try again.</p></div>
                                    <div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields
                                            in the form before sending.</p></div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
