<!-- SVG Cart Area
        ===================================== -->
<div class="svg-container2">
    <!-- svg start -->
    <svg id="svgLine" xmlns="http://www.w3.org/2000/svg" version="1.1"
         width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 2000 250"
         preserveAspectRatio="xMinYMax">

        <polygon points="-150,300 200,90 550,140 800,60 1100,150 1400,100 1700,10 1900,50 2500,90 2500,300"
                 fill="url(#BglinierGradient)" stroke="none">
        </polygon>

        <polyline points="-150,244 200,90 550,140 800,60 1100,150 1400,100 1700,10 1900,50 2500,90 2500,500"
                  fill="none" stroke="#7668af" stroke-width="0">
        </polyline>

        <text x="170" y="20" fill="#8b949b" style="font-size: 120%; font-weight: 400;">.</text>
        <text x="170" y="60" fill="#5cb85c" style="font-size: 250%; font-weight: 300;">.</text>

        <text x="510" y="60" fill="#8b949b" style="font-size: 120%; font-weight: 400;">.</text>
        <text x="520" y="100" fill="#5f6467" style="font-size: 250%; font-weight: 300;">.</text>

        <text x="760" y="0" fill="#8b949b" style="font-size: 120%; font-weight: 400;">.</text>
        <text x="760" y="40" fill="#b2cc71" style="font-size: 250%; font-weight: 300;">.</text>

        <text x="1060" y="70" fill="#8b949b" style="font-size: 120%; font-weight: 400;">.</text>
        <text x="1060" y="110" fill="#3c88c6" style="font-size: 250%; font-weight: 300;">.</text>

        <text x="1350" y="30" fill="#8b949b" style="font-size: 120%; font-weight: 400;">.</text>
        <text x="1350" y="70" fill="#1abc9c" style="font-size: 250%; font-weight: 300;">.</text>

        <text x="1650" y="90" fill="#333333"
              style="font-size: 140%; font-weight: 300; font-family: 'Pacifico', cursive;">Allgäu
        </text>

        <ellipse id="svg_1" rx="15" ry="15" cx="200" cy="90" fill="#5cb85c" stroke="#ffffff" stroke-width="5"></ellipse>
        <ellipse id="svg_2" rx="10" ry="10" cx="550" cy="140" fill="#5f6467" stroke="#ffffff"
                 stroke-width="5"></ellipse>
        <ellipse id="svg_3" rx="15" ry="15" cx="800" cy="60" fill="#b2cc71" stroke="#ffffff" stroke-width="5"></ellipse>
        <ellipse id="svg_4" rx="15" ry="15" cx="1100" cy="150" fill="#3c88c6" stroke="#ffffff"
                 stroke-width="5"></ellipse>
        <ellipse id="svg_5" rx="10" ry="10" cx="1400" cy="100" fill="#1abc9c" stroke="#ffffff"
                 stroke-width="5"></ellipse>
        <ellipse id="svg_6" rx="10" ry="10" cx="1700" cy="10" fill="#a85ad4" stroke="#ffffff"
                 stroke-width="5"></ellipse>
        <ellipse id="svg_7" rx="9" ry="9" cx="1900" cy="50" fill="#ff8b34" stroke="#ffffff" stroke-width="5"></ellipse>
        <ellipse id="svg_8" rx="6" ry="6" cx="2500" cy="90" fill="#fd40b3" stroke="#ffffff" stroke-width="5"></ellipse>
        <ellipse id="svg_9" rx="6" ry="6" cx="2200" cy="90" fill="#fd3635" stroke="#ffffff" stroke-width="5"></ellipse>

        <defs>
            <lineargradient id="BglinierGradient" x1="0" y1="0" x2="0" y2="1">
                <stop id="BgLinierGradientStop_1" stop-opacity="1" stop-color="#e8f3f5" offset="0"></stop>
                <stop id="BgLinierGradientStop_2" stop-opacity="1" stop-color="#e8f3f5" offset="1"></stop>
            </lineargradient>
            <fs>
            </fs>
        </defs>
    </svg>
    <!-- svg end -->
</div><!-- svg container end -->


<!-- Contact Us Area
       =====================================-->
<div id="contact" class="pt100 pb100 bg-grad-stellar">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="row">

                    <!-- title start -->
                    <div class="col-md-12 mb50">
                        <h1 class="font-size-normal color-light">


                            Schreiben Sie uns eine Nachricht </h1>
                        <h5 class="color-light">Bitte zögern Sie nicht uns bei Fragen zu kontaktieren. Unser Personal
                            wird jeder Anfrage umgehend bearbeiten. <br></h5>
                    </div>
                    <!-- title end -->

                    <!-- contact info start -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <span class="icon-map color-light el-icon2x"></span>
                        <h5 class="color-light"><strong>Adresse</strong></h5>
                        <p class="color-light">{{ nova_get_setting('Schreiben_adresse') }}</p></div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <span class="icon-megaphone color-light el-icon2x"></span>
                        <h5 class="color-light"><strong>Telefon</strong></h5>
                        <p class="color-light">{{ nova_get_setting('Schreiben_telefon') }}</p></div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <span class="icon-envelope color-light el-icon2x"></span>
                        <h5 class="color-light"><strong>Email</strong></h5>
                        <p class="color-light">{{ nova_get_setting('Schreiben_email') }}</p></div>
                    <!-- contact info end -->

                </div><!-- row left end -->
            </div><!-- col left end -->

            <div class="col-md-6">
                <div class="contact contact-us-one">
                    <div class="col-sm-12 col-xs-12 text-center mb20">
                        <h4 class="pb25 bb-solid-1">
                            Ihre Nachricht an uns <small class="">Bitte füllen Sie das Formular aus. Wir melden uns
                                schnellstmöglich zurück.</small>
                        </h4>
                    </div>
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
                                    onclick="dataLayer.push({ event: 'buttonClick' })"
                                    class="btn btn-primary btn-block">
                                Nachricht senden
                            </button>
                        </div>
                    </form>
                </div><!-- div contact end -->
            </div><!-- col end -->

        </div><!-- row end -->
    </div><!-- container end -->
</div><!-- section contact end -->


<!--
      <div class="modal fade" id="select_language" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body slanguage_content">
              <p>
              	<a href="/se/node/15/"></a>
              	<a href="/en/node/15/">english</a>
              	<a href="/node/15/">deutsch</a>
              </p>
            </div>
          </div>
        </div>
      </div> -->


<!-- footer Area
    ===================================== -->
<div id="footer" class="footer-two pt50">
    <div class="container-fluid bb-solid-1">
        <div class="container pb35">
            <div class="row">

                <!-- footer about start -->
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <h6 class="font-montserrat text-uppercase color-dark">Informationen</h6>
                    <p>
                    @foreach($footer_menus as $item)
                            <a href="{{ route('page', ['slug' => $item->slug]) }}">{{ $item->title }}</a> <br>
                    @endforeach
                    </p>

                    <!-- <p></p> -->
                </div>
                <!-- footer about end -->


                <!-- footer social icons start -->
                <div class="col-md-2 col-sm-3 col-xs-12 pull-right">
                    <h6 class="font-montserrat text-uppercase color-dark">Soziale Medien</h6>
                    <div class="social social-one pull-left">
                        <a href="{{ nova_get_setting('footer-facebook') }}" target="_blank">
                            <i class="fa fa-facebook color-primary"></i>
                        </a>
                        <a href="{{ nova_get_setting('footer-instagram') }}" target="_blank">
                            <i class="fa fa-instagram color-primary"></i>
                        </a>
                        <a href="{{ nova_get_setting('footer-youtube') }}" target="_blank">
                            <i class="fa fa-youtube color-primary"></i>
                        </a>
                    </div>
                </div>
                <!-- footer social icons end -->

            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- container-fluid end -->

    <div class="container-fluid pt20">
        <div class="container">
            <div class="row">

                <!-- copyright start -->
                <div class="col-md-6 col-sm-6 col-xs-6 pull-left">
                    <p>Copyright &copy; 2016-2023 B&T. Alle Rechte vorbehalten. </p>
                </div>
                <!-- copyright end -->

                <!-- footer bottom start -->
                <div class="col-md-6 col-sm-6 col-xs-6 pull-right">
                    <p class="text-right">
                        made with <i class="fa fa-heart"></i> by <a href="https://ayvazyan.pro" target="_blank"
                                                                    class="mr20">ayvazyan.pro</a>
                    </p>
                </div>
                <!-- footer bottom end -->

            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- container-fluid end -->
</div><!-- footer end -->
