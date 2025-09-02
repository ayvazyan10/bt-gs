@extends('layout.core')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    <section id="static_page" class="py-20">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach(json_decode($page->partners, true) as $partner)
                    <article class="min-h-[300px]">
                        <div class="rounded-xl overflow-hidden ring-1 ring-slate-200 bg-white h-full flex flex-col">
                            {{-- превью логотипа как background, size 150px, по центру, без повторов --}}
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
            </div>
        </div>
    </section>
@endsection
