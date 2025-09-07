@extends('layout.core')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    $toUrl = function ($path, $fallback = null) {
        if (empty($path)) return $fallback;
        if (Str::startsWith($path, ['http://','https://','/'])) return $path;
        return Storage::url($path);
    };

    $heroBg       = $toUrl($page->hero_bg, Vite::asset('resources/images/Rechteck-84.png'));
    $heroAvatar   = $toUrl($page->hero_avatar, Vite::asset('resources/images/DSC02140-v2-m.png'));
    $heroBarColor = $page->hero_bar_color ?: '#00A6D3';
    $formBg       = $page->form_bg_color ?: '#c5ebf4';

    $cardLogo     = $toUrl($page->card_logo, Vite::asset('resources/images/blue-bt.png'));
    $sloganColor  = $page->slogan_color ?: '#00A6D3';

    $duoLeft      = $toUrl($page->duo_left,  Vite::asset('resources/images/Gruppe3465.png'));
    $duoRight     = $toUrl($page->duo_right, Vite::asset('resources/images/Gruppe3465.png'));
@endphp

@section('content')
    <section class="relative overflow-hidden">
        <div class="relative min-h-[340px] md:min-h-[460px] lg:min-h-[520px] bg-center bg-cover"
             style="background-image:url('{{ $heroBg }}');">
            <div class="absolute bottom-0 right-0 left-0 bg-[#00A6D3]">
                <img
                    src="{{ $heroAvatar }}"
                    alt="Avatar"
                    class="absolute left-25 sm:left-8 lg:left-70 -top-35 md:-top-50
                           w-40 h-40 sm:w-56 sm:h-56 lg:w-72 lg:h-72 rounded-full object-cover
                           ring-8 ring-white shadow-xl"
                />
                <div class="w-full px-4 lg:px-8 text-center">
                    <h2 class="py-8 w-full md:py-12 font-light text-white text-center uppercase max-w-3xl mx-auto tracking-[0.06em]
                               text-2xl md:text-4xl lg:text-5xl leading-tight">
                        {{ $page->hero_headline ?: 'Als Clubmitglied kannst du uns 1x gratis testen!' }}
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="border-t-2" style="border-color: {{ $heroBarColor }};">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8 py-12 md:py-20">
            <div class="grid lg:grid-cols-12 gap-10 items-start">
                <div class="lg:col-span-7">
                    <h2 class="text-3xl md:text-4xl lg:text-[44px] font-light leading-tight tracking-tight uppercase text-black">
                        {{ $page->offer_heading_top ?: 'ALS MITGLIED IM GOLFPARK LENZFRIED' }}<br>
                        <span style="color: {{ $heroBarColor }};">
                            {{ $page->offer_heading_accent ?: 'BIETE ICH MEINEN CLUBKOLLEGEN EIN EXKLUSIVES EXTRA!' }}
                        </span>
                    </h2>


                    <div class="mt-8 space-y-6 text-lg leading-8 text-slate-900 ck-content">
                        {!! $page->offer_richtext !!}
                    </div>

                </div>

                <div class="lg:col-span-5">
                    <div class="bg-[#c5ebf4] rounded-2xl p-10">
                        <h3 class="text-2xl md:text-3xl tracking-wide uppercase text-center text-black">
                            {{ $page->form_title ?: '1x Gratis Fensterreinigung' }}
                        </h3>

                        <form action="{{ route('golf.kontakt.send') }}" method="post" class="mt-8 space-y-5">
                            @csrf
                            {!! RecaptchaV3::field('golfform') !!}

                            @if(session('success'))
                                <div
                                    class="rounded-md border border-emerald-300 bg-emerald-50 text-emerald-800 px-4 py-3 text-sm">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" name="name" type="text" placeholder="Name:"
                                       class="w-full h-12 md:h-14 rounded-lg bg-white text-slate-900 placeholder-slate-500
                                              border border-white/60 px-4
                                              focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                                @error('name')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="sr-only">E-Mail</label>
                                <input id="email" name="email" type="email" placeholder="E-Mail:"
                                       class="w-full h-12 md:h-14 rounded-lg bg-white text-slate-900 placeholder-slate-500
                                              border border-white/60 px-4
                                              focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                                @error('email')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div>
                                <label for="zeitraum" class="sr-only">Gewünschter Zeitraum</label>
                                <input id="zeitraum" name="zeitraum" type="text" placeholder="Gewünschter Zeitraum:"
                                       class="w-full h-12 md:h-14 rounded-lg bg-white text-slate-900 placeholder-slate-500
                                              border border-white/60 px-4
                                              focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                                @error('zeitraum')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            @if($page->contact_phone || $page->contact_email)
                                <p class="pt-2 text-base md:text-lg text-black">
                                    @if($page->contact_phone)
                                        <span>Telefon: {{ $page->contact_phone }}</span>
                                    @endif
                                    @if($page->contact_phone && $page->contact_email)
                                        <span class="px-2">|</span>
                                    @endif
                                    @if($page->contact_email)
                                        <span>E-Mail: {{ $page->contact_email }}</span>
                                    @endif
                                </p>
                            @endif

                            <div class="pt-2">
                                <button type="submit"
                                        class="block w-full mx-auto items-center justify-center
                                             py-3 px-8 rounded-full max-w-[230px] bg-[#00A6D3] text-white
                                             font-semibold tracking-wide uppercase
                                             hover:bg-cyan-700 active:scale-[0.99] transition">
                                    Termin buchen
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-20">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">

            @php
                $featuresRaw = $page->features ?? '[]';
                $featuresArr = is_string($featuresRaw) ? json_decode($featuresRaw, true) : $featuresRaw;
                if (!is_array($featuresArr)) $featuresArr = [];

                $features = collect($featuresArr)->map(function ($item) {
                    $attrs   = $item['attributes'] ?? [];
                    $image   = $attrs['image'] ?? null;
                    $bullets = collect($attrs['bullets'] ?? [])
                        ->map(fn($b) => $b['attributes']['text'] ?? null)
                        ->filter()
                        ->values();

                    return (object) ['image' => $image, 'bullets' => $bullets];
                })->filter(fn($f) => $f->image || $f->bullets->isNotEmpty())
                  ->values();

                $urlify = function ($path) {
                    if (!$path) return Vite::asset('resources/images/Gruppe3465.png');
                    return Storage::url($path);
                };
            @endphp

            @if($features->isNotEmpty())
                <div class="grid lg:grid-cols-2 gap-10">
                    @foreach($features as $feature)
                        @php $img = $urlify($feature->image); @endphp

                        <div>
                            <figure class="aspect-[16/9] md:aspect-[3/2] overflow-hidden">
                                <img src="{{ $img }}" alt="" class="w-full h-full object-cover">
                            </figure>

                            @if($feature->bullets->isNotEmpty())
                                <ul class="mt-6 list-disc pl-6 text-black text-xl leading-8 font-semibold space-y-1">
                                    @foreach($feature->bullets as $text)
                                        <li>{{ $text }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    <section class="py-12 md:py-16">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            <div class="rounded-[28px] bg-white shadow-[0_5px_20px_rgba(0,0,0,0.3)] ring-1 ring-slate-100">
                <div class="px-6 md:px-12 lg:px-16 py-10 md:py-14 lg:py-16">

                    <div class="flex items-center justify-center gap-3 mb-10 md:mb-15">
                        <img src="{{ $cardLogo }}" alt="Logo" class="h-[40px] w-auto">
                    </div>

                    <div class="grid lg:grid-cols-12 gap-10 items-start">
                        <div class="lg:col-span-5">
                            <div class="uppercase text-right font-light leading-[0.95] tracking-tight"
                                 style="color: {{ $sloganColor }};">
                                <div
                                    class="text-[56px] md:text-[84px] lg:text-[125px]">{{ $page->slogan_line1 ?: 'IMMER' }}</div>
                                <div
                                    class="text-[56px] md:text-[84px] lg:text-[125px]">{{ $page->slogan_line2 ?: 'SAUBER' }}</div>
                                <div
                                    class="text-[56px] md:text-[84px] lg:text-[125px]">{{ $page->slogan_line3 ?: 'BLEIBEN' }}</div>
                            </div>
                        </div>

                        <div class="lg:col-span-7">
                            @php
                                $benefits = collect();

                                $arr = json_decode($page->benefits, true) ?: [];
                                $benefits = collect($arr)->map(function ($item) {
                                    $a = $item['attributes'] ?? [];
                                    return (object)[
                                        'title' => $a['title'] ?? null,
                                        'text'  => $a['text']  ?? null, // CKEditor/Trix HTML allowed
                                    ];
                                });


                                $benefits = $benefits
                                    ->filter(fn($b) => filled($b->title) || filled($b->text))
                                    ->values();

                                $__sloganColor = $sloganColor ?? '#00A6D3';
                            @endphp

                            <div class="space-y-10 text-slate-700 text-base md:text-lg leading-7 md:leading-8">
                                @foreach($benefits as $b)
                                    <div>
                                        @if(filled($b->title))
                                            <h3 class="font-semibold md:font-bold" style="color: {{ $__sloganColor }};">
                                                {{ $b->title }}
                                            </h3>
                                        @endif

                                        @if(filled($b->text))
                                            <div class="mt-1 ck-content">{!! $b->text !!}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-20">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-8 md:gap-12">
                <figure class="aspect-[16/9] md:aspect-[3/2] overflow-hidden">
                    <img src="{{ $duoLeft }}" alt="" class="w-full h-full object-cover">
                </figure>
                <figure class="aspect-[16/9] md:aspect-[3/2] overflow-hidden">
                    <img src="{{ $duoRight }}" alt="" class="w-full h-full object-cover">
                </figure>
            </div>

            <div class="mt-12 md:mt-16 text-center">
                @if($page->season_headline)
                    <h2 class="text-2xl md:text-3xl lg:text-[34px] leading-tight tracking-tight text-black uppercase">
                        {{ $page->season_headline }}
                    </h2>
                @endif

                @if($page->season_accent)
                    <p class="mt-2 text-2xl md:text-3xl lg:text-[34px] leading-tight tracking-tight uppercase text-[#00A6D3] ck-content">
                        {!! $page->season_accent !!}
                    </p>
                @endif

                @if($page->signature_name)
                    <div class="mt-6 text-lg md:text-xl font-semibold text-black">
                        {{ $page->signature_name }}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
