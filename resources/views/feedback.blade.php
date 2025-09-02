@extends('layout.core')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    <section id="shop-info" class="bg-gradient-to-b from-cyan-700 to-cyan-600">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8 py-10 md:py-14">
            <h3 class="text-slate-100 underline underline-offset-4">Immenstadt</h3>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-flag text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('im_adresse') }}</h5>
                    <p class="text-white/70">adresse</p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-mobile text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('im_telefon') }}</h5>
                    <p class="text-white/70">telefon</p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-mobile text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('im_fax') }}</h5>
                    <p class="text-white/70">telefon</p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-chat text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('im_email') }}</h5>
                    <p class="text-white/70">email</p>
                </div>
            </div>

            <h3 class="mt-10 text-slate-100 underline underline-offset-4">Mannheim</h3>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-flag text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('man_adresse') }}</h5>
                    <p class="text-white/70">adresse</p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-mobile text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('man_telefon') }}</h5>
                    <p class="text-white/70">telefon</p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-printer text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('man_fax') }}</h5>
                    <p class="text-white/70">fax</p>
                </div>

                <div class="text-center p-6 rounded-xl ring-1 ring-white/10 bg-white/5 backdrop-blur">
                    <span class="icon-chat text-white text-3xl block"></span>
                    <h5 class="mt-2 text-white">{{ nova_get_setting('man_email') }}</h5>
                    <p class="text-white/70">email</p>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="py-8 md:py-10 mb-10">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            <div class="mt-8 grid lg:grid-cols-12 gap-15">
                <div class="lg:col-span-7">
                    <div class="aspect-[4/3] lg:aspect-[4/3] rounded-xl overflow-hidden ring-1 ring-slate-200">
                        <iframe
                            src="{{ nova_get_setting('map_url') }}"
                            class="w-full h-full"
                            style="border:0"
                            loading="lazy"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <h3 class="text-2xl font-semibold">
                        <small class="block text-cyan-600">...</small>
                        Jetzt Anfragen
                    </h3>

                    <div class="mt-4 rounded-xl bg-slate-100 p-5 ring-1 ring-slate-200">
                        <form id="contactForm" method="POST" action="{{ route('kontakt.send') }}" class="space-y-5">
                            @csrf
                            {!! RecaptchaV3::field('contactform') !!}

                            @if(session('success'))
                                <div class="rounded-md border border-emerald-300 bg-emerald-50 text-emerald-800 px-4 py-3 text-sm">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div>
                                <label class="block text-sm font-medium text-slate-700">Vollständiger Name</label>
                                <input type="text" name="senderName" value="{{ old('senderName') }}"
                                       class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2
                         focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                                @error('senderName')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700">E-Mail-Adresse</label>
                                <input type="email" name="senderEmail" value="{{ old('senderEmail') }}"
                                       class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2
                         focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                                @error('senderEmail')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700">Ihre Nachricht</label>
                                <textarea name="message" rows="4"
                                          class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2
                         focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">{{ old('message') }}</textarea>
                                @error('message')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700">Sicherheitsfrage: 8 + 11 = ?</label>
                                <input type="text" name="senderHuman" value="{{ old('senderHuman') }}"
                                       class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2
                         focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                                <input type="hidden" name="checkHuman_a" value="8">
                                <input type="hidden" name="checkHuman_b" value="11">
                                @error('senderHuman')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit"
                                        onclick="dataLayer?.push({ event: 'contactFormClick' })"
                                        class="inline-flex w-full items-center justify-center h-12 rounded-full
                               bg-cyan-600 text-white font-semibold tracking-wide
                               hover:bg-cyan-700 active:scale-[0.99] transition">
                                    Nachricht senden
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
