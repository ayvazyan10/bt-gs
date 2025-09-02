@extends('layout.core')

@include('layout.utils.meta-tags', [
    'title' => $gallery->meta_title ?: $gallery->title,
    'description' => $gallery->meta_description,
    'keywords' => $gallery->meta_keywords,
    'image' => $gallery->meta_image,
])

@section('content')
    <header
        class="relative overflow-hidden bg-gradient-to-b from-cyan-700 to-cyan-600"
    >
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative py-24 md:py-32">
            <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
                <div class="text-center pt-10">
                    <h1 class="text-white uppercase tracking-wide text-3xl md:text-5xl font-semibold">
                        {{ $gallery->title }}
                        <small class="block mt-2 text-white/70 uppercase tracking-wide">
                            {{ $gallery->content }}
                        </small>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <section id="portfolioMasonry" class="py-10 md:py-14"
             x-data="{ open:false, src:null }" @keydown.escape.window="open=false">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 [column-fill:_balance]">

                @foreach($gallery->gallery_images as $image)
                    <figure class="mb-4 break-inside-avoid rounded-xl overflow-hidden relative group cursor-pointer">
                        <img src="{{ $image }}" alt="" class="w-full h-auto object-cover align-top cursor-pointer">

                        <button type="button"
                                @click.prevent="src='{{ $image }}'; open=true"
                                class="absolute cursor-pointer inset-0 grid place-items-center bg-black/0 group-hover:bg-black/40 transition">
                                <svg viewBox="0 0 576 512" class="opacity-0 group-hover:opacity-100 w-9 h-9 text-amber-50" fill="#ffffff" xmlns="http://www.w3.org/2000/svg"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg>
                            <span class="sr-only">Open image</span>
                        </button>
                    </figure>
                @endforeach

            </div>
        </div>

        <div x-show="open"
             x-transition.opacity
             class="fixed inset-0 z-50 bg-black/80 p-4 md:p-8"
             @click.self="open=false">
            <div class="h-full w-full flex items-center justify-center">
                <img :src="src" alt="" class="max-h-full max-w-full rounded-xl shadow-2xl">
            </div>

            <button class="absolute cursor-pointer top-4 right-4 inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/90 hover:bg-white"
                    @click="open=false" aria-label="Close">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2"/>
                </svg>
            </button>
        </div>
    </section>
@endsection
