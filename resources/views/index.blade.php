@extends('layout.core')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    <section
        x-data="{
                  i: 0,
                  count: {{ count($page->slider) }},
                  timer: null,
                  next(){ this.i = (this.i + 1) % this.count },
                  prev(){ this.i = (this.i - 1 + this.count) % this.count },
                  play(){ this.timer = setInterval(()=>this.next(), 6000) },
                  stop(){ clearInterval(this.timer) }
              }"
        x-init="play()"
        @mouseenter="stop()" @mouseleave="play()"
        class="relative overflow-hidden bg-black"
        aria-label="Hero slider"
    >
        <div class="relative h-[60vh] min-h-[420px] w-full">
            @foreach($page->slider as $slide)
                @php(extract($slide['attributes']))
                <div
                    x-show="i === {{ $loop->index }}"
                    x-transition.opacity.duration.700ms
                    class="absolute inset-0 will-change-transform"
                    role="group"
                    aria-roledescription="slide"
                    aria-label="{{ $loop->iteration }} / {{ count($page->slider) }}"
                    style="background-image:url('{{ $image }}'); background-position:center; background-size:cover;"
                >
                    <div class="absolute inset-0 bg-black/30"></div>

                    <div class="relative h-full">
                        <div class="mx-auto max-w-screen-2xl h-full px-4 lg:px-8 flex items-center">
                            <div class="max-w-3xl">
                                <h1 class="text-left uppercase tracking-tight text-white text-3xl md:text-5xl font-semibold">
                                    {{ $title }}
                                </h1>

                                <p class="mt-5 text-white/90 text-base md:text-lg">
                                    <span class="text-black/90 bg-white/70 px-1 rounded">{{ $description }}</span>
                                    @if($button)
                                        <br>
                                        <a href="{{ $link }}"
                                           class="inline-flex items-center justify-center mt-6 h-12 px-6 rounded-full bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">
                                            {{ $button }}
                                        </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button @click="prev()"
                class="absolute cursor-pointer left-10 top-1/2 -translate-y-1/2 grid place-items-center w-10 h-10 rounded-full bg-white/80 hover:bg-white shadow">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M15 6l-6 6 6 6" stroke="currentColor" stroke-width="2"/>
            </svg>
            <span class="sr-only">Previous</span>
        </button>
        <button @click="next()"
                class="absolute cursor-pointer right-10 top-1/2 -translate-y-1/2 grid place-items-center w-10 h-10 rounded-full bg-white/80 hover:bg-white shadow">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2"/>
            </svg>
            <span class="sr-only">Next</span>
        </button>

        <ol class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
            @foreach($page->slider as $slide)
                <li>
                    <button @click="i = {{ $loop->index }}"
                            :class="i === {{ $loop->index }} ? 'bg-cyan-600' : 'bg-white/70'"
                            class="h-2.5 w-2.5 rounded-full ring-2 ring-white/70 transition"></button>
                </li>
            @endforeach
        </ol>
    </section>

    <section id="welcome" class="pt-12 md:pt-20">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            <div class="text-center">
                <h1 class="text-2xl md:text-4xl font-semibold leading-tight">
                    <small class="block text-base md:text-lg font-normal text-slate-600">
                        Ihr kompetenter Partner rund um die gewerbliche und private Reinigung
                    </small>
                    B&amp;T Gebäudeservice – Alles Sauber
                </h1>
            </div>

            <div class="mt-8">
                <div class="aspect-video rounded-xl overflow-hidden shadow">
                    <iframe class="w-full h-full"
                            src="https://www.youtube.com/embed/4EhYIi6R_iA"
                            title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
            </div>

            <div class="mt-10 mx-auto max-w-3xl text-center text-slate-800">
                <p>
                    <span class="text-lg md:text-xl font-semibold">
                      Sauberkeit und Hygiene ist unsere Passion. Als Komplettdienstleister bieten wir Ihnen ein breites Servicespektrum rund um die Themen Reinigung, Sauberkeit, Hygiene und Saubere Umwelt. Verschaffen sie sich auf unserer Internetseite einen ersten Einblick in unsere Betätigungsfelder und unsere Firmenphilosophie. Und wenn Sie fragen haben, rufen Sie uns einfach an. Wir sind 7 Tage in der Woche für Sie da. Versprochen!
                    </span>
                    <br><br>
                    PERFEKTE SAUBERKEIT BIS IN ALLE ECKEN ERREICHEN WIR FÜR SIE MIT:
                    <br><br>
                    • zuverlässigen, hoch motivierten und vertrauenswürdigen Mitarbeitern <br>
                    • regelmäßigen fachlichen Schulungen und Fortbildungen<br>
                    • modernen Reinigungsgeräten und –Mitteln<br>
                    • hohen Qualitätsansprüchen und besonderer Gründlichkeit
                </p>
            </div>

            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-6 rounded-xl ring-1 ring-slate-200 hover:shadow-md transition">
                    <div class="mx-auto mb-3 h-12 w-12 grid place-items-center rounded-xl bg-cyan-50 text-cyan-600">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6">
                            <path d="M9 6l6-3 6 3v12l-6-3-6 3-6-3V3l6 3z" stroke="currentColor" stroke-width="1.5"
                                  stroke-linejoin="round"/>
                            <path d="M9 6v12M15 3v12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h5 class="font-semibold">Allgäu und Umkreis</h5>
                    <p class="text-sm text-slate-600"></p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-slate-200 hover:shadow-md transition">
                    <div class="mx-auto mb-3 h-12 w-12 grid place-items-center rounded-xl bg-cyan-50 text-cyan-600">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6">
                            <path
                                d="M6.5 3h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.5a11 11 0 0 0 6.5 6.5V15a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2.5a2 2 0 0 1-2.2 2A17 17 0 0 1 3.5 7.7 2 2 0 0 1 5.5 5.5V3a0 0 0 0 1 1 0Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h5 class="font-semibold">Immer Erreichbar</h5>
                    <p class="text-sm text-slate-600"></p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-slate-200 hover:shadow-md transition">
                    <div class="mx-auto mb-3 h-12 w-12 grid place-items-center rounded-xl bg-cyan-50 text-cyan-600">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6">
                            <path d="M3 12h8M7 8l4 4-4 4M21 12h-8M17 8l-4 4 4 4" stroke="currentColor"
                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h5 class="font-semibold">Flexibel</h5>
                    <p class="text-sm text-slate-600"></p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-slate-200 hover:shadow-md transition">
                    <div class="mx-auto mb-3 h-12 w-12 grid place-items-center rounded-xl bg-cyan-50 text-cyan-600">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6">
                            <path d="M12 3l7 3v5c0 5-3.5 8-7 10-3.5-2-7-5-7-10V6l7-3Z" stroke="currentColor"
                                  stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h5 class="font-semibold">Qualität</h5>
                    <p class="text-sm text-slate-600"></p>
                </div>
            </div>

        </div>
    </section>

    <section id="referenzen_area" class="pt-25">
        <div class="px-4 lg:px-8">
            <h4 class="text-2xl font-semibold text-center">Referenzen</h4>
            <div class="relative mt-8">>
                <div class="pointer-events-none absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent"></div>

                <div class="marquee-group overflow-hidden">
                    <div class="marquee-track flex gap-6">
                        @foreach(json_decode($referenzen->partners, true) as $partner)
                            <article class="min-h-[300px] w-80 flex-none">
                                <div class="rounded-xl overflow-hidden border border-slate-200 bg-white h-full flex flex-col hover:border-cyan-400 transition">
                                    <div class="h-[200px] w-full bg-white bg-center bg-no-repeat bg-[length:150px]
                                    grayscale hover:grayscale-0 transition"
                                         style="background-image:url('{{ $partner['attributes']['logo'] }}')">
                                    </div>

                                    <div class="p-3">
                                        <h5 class="font-semibold leading-tight">
                                            {{ $partner['attributes']['name'] }}
                                            <small class="block">
                                                <a href="{{ $partner['attributes']['link'] }}" target="_blank" rel="noopener"
                                                   class="text-cyan-700 hover:text-cyan-900 underline underline-offset-4">
                                                    Webseite besuchen
                                                </a>
                                            </small>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                        @foreach(json_decode($referenzen->partners, true) as $partner)
                            <article class="min-h-[300px] w-80 flex-none" aria-hidden="true">
                                <div class="rounded-xl overflow-hidden border border-slate-200 bg-white h-full flex flex-col">
                                    <div class="h-[200px] w-full bg-white bg-center bg-no-repeat bg-[length:150px] grayscale"
                                         style="background-image:url('{{ $partner['attributes']['logo'] }}')">
                                    </div>

                                    <div class="p-3">
                                        <h5 class="font-semibold leading-tight">
                                            {{ $partner['attributes']['name'] }}
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-center gap-4 mt-6">
                    <button type="button"
                            class="px-4 py-2 rounded bg-slate-100 hover:bg-slate-200 text-sm font-medium marquee-pause">
                       <svg width="24" height="24" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="none" height="256" width="256"/><rect fill="none" height="176" rx="8" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" width="52" x="156" y="40"/><rect fill="none" height="176" rx="8" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" width="52" x="48" y="40"/></svg>
                    </button>
                    <button type="button"
                            class="px-4 py-2 rounded bg-slate-100 hover:bg-slate-200 text-sm font-medium marquee-play">
                        <svg width="24" height="24" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="none" height="256" width="256"/><path d="M228.1,121.2,84.2,33.2A8,8,0,0,0,72,40V216a8,8,0,0,0,12.2,6.8l143.9-88A7.9,7.9,0,0,0,228.1,121.2Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="review_area" class="py-25">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            <h4 class="text-2xl font-semibold text-center">Bewertungen</h4>

            <div class="mt-10">
                <div class="grid gap-8">
                    <div class="text-center max-w-3xl mx-auto">
                        <div class="text-lg font-semibold"><span>Natascha Drexel</span></div>
                        <p class="mt-2 text-slate-700">
                            Kompetente Beratung, Sauberkeit Top &#38; Allzeit Hilfsbereit. Werde euch aufjedenfall
                            weiter empfehlen.
                        </p>
                    </div>

                    <div class="text-center max-w-3xl mx-auto">
                        <div class="text-lg font-semibold"><span>Linda España</span></div>
                        <p class="mt-2 text-slate-700">
                            3 TATSACHEN :&#x29; ZUVERLÄSSIGKEIT, KOMPETENZ &#38; QUALITATIV HOCHWERTIGE ARBEIT :&#x29;
                        </p>
                    </div>

                    <div class="text-center max-w-3xl mx-auto">
                        <div class="text-lg font-semibold"><span>H. Fischer</span></div>
                        <p class="mt-2 text-slate-700">
                            Bin sehr zufrieden, hat alles gut geklappt. Gute Beratung, saubere Abwicklung, Reiningung
                            top. Nur weiter so. Wir werden Sie auf jeden Fall weiter empfehlen.
                        </p>
                    </div>

                    <div class="text-center max-w-3xl mx-auto">
                        <div class="text-lg font-semibold"><span>Angela Schranz</span></div>
                        <p class="mt-2 text-slate-700">
                            Wie immer - sauber, hilfsbereit und stets zuverlässig. Macht jedes Mal Spaß mit euch zu
                            arbeiten.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        :root {
            --marquee-duration: 20s;
        }
        .marquee-track {
            animation: marquee var(--marquee-duration) linear infinite;
            will-change: transform;
        }
        .marquee-group:hover .marquee-track,
        .marquee-track.is-paused {
            animation-play-state: paused;
        }
        @keyframes marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @media (prefers-reduced-motion: reduce) {
            .marquee-track { animation: none; }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.querySelector('.marquee-track');
            document.querySelector('.marquee-pause')?.addEventListener('click', () => {
                track.classList.add('is-paused');
            });
            document.querySelector('.marquee-play')?.addEventListener('click', () => {
                track.classList.remove('is-paused');
            });
        });
    </script>
@endpush
